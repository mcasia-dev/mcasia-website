<?php

namespace App\Services;

use App\Models\PublicPage\Recipe;

class RecipeService
{
    public function formatRecipe(Recipe $recipe): array
    {
        $ingredients = collect($recipe->ingredients ?? [])
            ->map(function ($ingredient): array {
                if (is_string($ingredient)) {
                    return ['name' => $ingredient];
                }

                if (!is_array($ingredient)) {
                    return ['name' => ''];
                }

                $item = trim((string)($ingredient['item'] ?? $ingredient['name'] ?? ''));
                $amount = trim((string)($ingredient['amount'] ?? ''));
                $unit = trim((string)($ingredient['unit'] ?? ''));
                $parts = array_filter([$amount, $unit, $item]);

                return ['name' => trim(implode(' ', $parts))];
            })
            ->filter(fn(array $ingredient) => !empty($ingredient['name']))
            ->values()
            ->all();

        $instructions = $this->parseInstructionSteps((string)$recipe->instructions);

        return [
            'slug' => $recipe->slug,
            'image' => $recipe->getFirstMediaUrl('recipe-image') ?: asset('images/RECIPE/new version/1.jpg'),
            'title' => $recipe->recipe_name,
            'description' => (string)($recipe->description ?? ''),
            'videoEmbed' => $recipe->getFirstMediaUrl('recipe-video') ?: null,
            'ingredients' => $ingredients,
            'instructions' => $instructions,
        ];
    }

    private function parseInstructionSteps(string $instructionsHtml): array
    {
        $instructionsHtml = trim($instructionsHtml);

        if ($instructionsHtml === '') {
            return [];
        }

        $dom = new \DOMDocument();
        libxml_use_internal_errors(true);
        $dom->loadHTML('<?xml encoding="utf-8" ?><div id="instructions-root">' . $instructionsHtml . '</div>', LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        libxml_clear_errors();

        $root = $dom->getElementById('instructions-root');
        $steps = [];

        if ($root) {
            // Prefer list items when editor content is an ordered/unordered list.
            $liNodes = $root->getElementsByTagName('li');
            foreach ($liNodes as $li) {
                $line = html_entity_decode(trim($li->textContent), ENT_QUOTES | ENT_HTML5, 'UTF-8');
                $line = preg_replace('/\s+/u', ' ', $line);

                if (!empty($line)) {
                    $steps[] = $line;
                }
            }

            if (!empty($steps)) {
                return array_values(array_unique($steps));
            }

            // Fallback for paragraph-based content.
            $paragraphs = $root->getElementsByTagName('p');
            foreach ($paragraphs as $p) {
                $line = html_entity_decode(trim($p->textContent), ENT_QUOTES | ENT_HTML5, 'UTF-8');
                $line = preg_replace('/\s+/u', ' ', $line);

                if (!empty($line)) {
                    $steps[] = $line;
                }
            }

            if (!empty($steps)) {
                return $steps;
            }
        }

        // Last resort: preserve line breaks and decode entities before splitting.
        $text = preg_replace('/<br\s*\/?>/i', PHP_EOL, $instructionsHtml);
        $text = preg_replace('/<\/p>/i', PHP_EOL, $text);
        $text = strip_tags($text);
        $text = html_entity_decode($text, ENT_QUOTES | ENT_HTML5, 'UTF-8');

        return collect(preg_split('/\r\n|\r|\n/', $text))
            ->map(fn(string $line): string => preg_replace('/\s+/u', ' ', trim($line)))
            ->filter()
            ->values()
            ->all();
    }
}
