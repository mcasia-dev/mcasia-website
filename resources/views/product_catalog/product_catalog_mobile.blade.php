<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0, user-scalable=yes">
    <title>Product Catalog Flipbook</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            -webkit-user-select: none;
            user-select: none;
            overflow: hidden;
            position: fixed;
            width: 100%;
            height: 100%;
        }
        
        .flipbook-wrapper {
            perspective: 1500px;
            perspective-origin: center;
            position: relative;
            width: 100%;
            height: 100%;
        }
        
        .page-container {
            position: absolute;
            width: 100%;
            height: 100%;
            transform-style: preserve-3d;
        }
        
        .page {
            position: absolute;
            width: 100%;
            height: 100%;
            transform-style: preserve-3d;
            transform-origin: left center;
            transition: transform 0.8s cubic-bezier(0.25, 0.46, 0.45, 0.94);
            backface-visibility: hidden;
        }
        
        .page-content {
            position: absolute;
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #000;
            overflow: hidden;
            backface-visibility: hidden;
        }
        
        .page-back {
            position: absolute;
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #1a1a1a;
            backface-visibility: hidden;
            transform: rotateY(180deg);
        }
        
        .page-content img {
            max-width: 100%;
            max-height: 100%;
            object-fit: contain;
            pointer-events: none;
            transition: transform 0.3s ease;
            transform-origin: center center;
        }
        
        .page.hidden {
            transform: rotateY(-180deg);
            pointer-events: none;
        }
        
        .page.current {
            z-index: 20;
            transform: rotateY(0deg);
        }
        
        .page.flipping {
            z-index: 30;
        }
        
        .page-indicator {
            position: fixed;
            bottom: 20px;
            left: 50%;
            transform: translateX(-50%);
            z-index: 100;
            background: rgba(0, 0, 0, 0.6);
            backdrop-filter: blur(10px);
            padding: 8px 20px;
            border-radius: 20px;
            pointer-events: none;
        }
        
        .zoom-controls {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 100;
            display: flex;
            flex-direction: row;
            gap: 10px;
        }

        .back-button {
            position: fixed;
            top: 20px;
            left: 20px;
            z-index: 100;
            padding: 10px 20px;
            border-radius: 25px;
            background: rgba(0, 0, 0, 0.6);
            backdrop-filter: blur(10px);
            color: white;
            border: none;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        
        .back-button:active {
            transform: scale(0.95);
            background: rgba(0, 0, 0, 0.8);
        }
        
        .zoom-btn {
            width: 48px;
            height: 48px;
            border-radius: 50%;
            background: rgba(0, 0, 0, 0.6);
            backdrop-filter: blur(10px);
            color: white;
            border: none;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.2s;
        }
        
        .zoom-btn:active {
            transform: scale(0.9);
            background: rgba(0, 0, 0, 0.8);
        }
        
        .nav-hint {
            position: fixed;
            top: 50%;
            transform: translateY(-50%);
            z-index: 50;
            background: rgba(0, 0, 0, 0.3);
            color: white;
            padding: 20px 15px;
            border-radius: 10px;
            opacity: 0;
            transition: opacity 0.3s;
            pointer-events: none;
        }
        
        .nav-hint.show {
            opacity: 1;
        }
        
        .nav-hint.left {
            left: 20px;
        }
        
        .nav-hint.right {
            right: 20px;
        }
    </style>
</head>
<body class="bg-black">
    <!-- Main Container -->
    <div id="flipbook-container" class="relative w-full h-full">
        <!-- Flipbook Wrapper -->
        <div class="flipbook-wrapper">
            <div id="pages-container" class="page-container">
                <!-- Pages will be loaded here -->
            </div>
        </div>
        
        <!-- Touch Areas -->
        <div class="absolute inset-0 flex z-40 pointer-events-none">
            <button id="prev-area" class="w-1/2 h-full pointer-events-auto focus:outline-none active:bg-white/5"></button>
            <button id="next-area" class="w-1/2 h-full pointer-events-auto focus:outline-none active:bg-white/5"></button>
        </div>
        
        <!-- Navigation Hints -->
        <div id="prev-hint" class="nav-hint left">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
            </svg>
        </div>
        <div id="next-hint" class="nav-hint right">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
            </svg>
        </div>
        
        <!-- Back Button -->
        <button id="back-button" class="back-button">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
            </svg>
            Go Back
        </button>
        
        <!-- Zoom Controls -->
        <div class="zoom-controls">
            <button id="zoom-in" class="zoom-btn">+</button>
            <button id="zoom-out" class="zoom-btn">−</button>
            <button id="zoom-reset" class="zoom-btn" style="font-size: 20px;">⟲</button>
        </div>
        
        <!-- Page Indicator -->
        <div class="page-indicator">
            <span id="current-page" class="text-white font-semibold text-sm">1</span>
            <span class="text-gray-400 text-sm"> / </span>
            <span id="total-pages" class="text-gray-300 text-sm">0</span>
        </div>
    </div>

    <script>
        class Flipbook {
            constructor() {
                this.currentPage = 0;
                this.totalPages = 0;
                this.isAnimating = false;
                this.touchStartX = 0;
                this.touchEndX = 0;
                this.isDragging = false;
                this.dragThreshold = 50;
                this.zoomLevel = 1;
                this.minZoom = 1;
                this.maxZoom = 3;
                this.zoomStep = 0.5;
                this.isPinching = false;
                this.lastDistance = 0;
                this.panX = 0;
                this.panY = 0;
                this.lastTouchX = 0;
                this.lastTouchY = 0;
                
                this.init();
            }
            
            async init() {
                await this.loadPages();
                this.setupEventListeners();
                this.updateUI();
                this.showInitialHints();
            }
            
            async loadPages() {
                // Generate page files from page1.png to page40.png
                const pageFiles = [];
                for (let i = 1; i <= 40; i++) {
                    pageFiles.push(`${i}.png`);
                }
                
                this.totalPages = pageFiles.length;
                const container = document.getElementById('pages-container');
                
                // Create all pages
                pageFiles.forEach((page, index) => {
                    const pageDiv = document.createElement('div');
                    pageDiv.className = 'page';
                    pageDiv.dataset.pageNum = index;
                    
                    if (index === 0) {
                        pageDiv.classList.add('current');
                    } else {
                        pageDiv.classList.add('hidden');
                    }
                    
                    // Front of page
                    const pageContent = document.createElement('div');
                    pageContent.className = 'page-content';
                    
                    const img = document.createElement('img');
                    img.src = `/images/product_catalog/${page}`;
                    img.alt = `Page ${index + 1}`;
                    img.draggable = false;
                    
                    // Error handling for missing images
                    img.onerror = () => {
                        pageContent.innerHTML = `
                            <div class="text-center text-gray-400 p-8">
                                <svg class="w-16 h-16 mb-4 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                <p class="text-base font-medium">Page ${index + 1}</p>
                                <p class="text-sm mt-2 opacity-60">Image not found</p>
                            </div>
                        `;
                    };
                    
                    pageContent.appendChild(img);
                    pageDiv.appendChild(pageContent);
                    
                    // Back of page (for realistic flip)
                    const pageBack = document.createElement('div');
                    pageBack.className = 'page-back';
                    pageDiv.appendChild(pageBack);
                    
                    container.appendChild(pageDiv);
                });
                
                document.getElementById('total-pages').textContent = this.totalPages;
            }
            
            setupEventListeners() {
                const container = document.getElementById('flipbook-container');
                
                // Touch events for navigation and zoom
                container.addEventListener('touchstart', (e) => {
                    if (e.touches.length === 2) {
                        // Pinch zoom
                        this.isPinching = true;
                        this.lastDistance = this.getDistance(e.touches[0], e.touches[1]);
                    } else if (e.touches.length === 1) {
                        this.touchStartX = e.touches[0].clientX;
                        this.lastTouchX = e.touches[0].clientX;
                        this.lastTouchY = e.touches[0].clientY;
                        this.isDragging = false;
                    }
                }, { passive: true });
                
                container.addEventListener('touchmove', (e) => {
                    if (e.touches.length === 2 && this.isPinching) {
                        // Handle pinch zoom
                        e.preventDefault();
                        const distance = this.getDistance(e.touches[0], e.touches[1]);
                        const delta = distance - this.lastDistance;
                        
                        if (Math.abs(delta) > 5) {
                            const zoomDelta = delta * 0.01;
                            this.setZoom(this.zoomLevel + zoomDelta);
                            this.lastDistance = distance;
                        }
                    } else if (e.touches.length === 1) {
                        const touchX = e.touches[0].clientX;
                        const touchY = e.touches[0].clientY;
                        
                        if (this.zoomLevel > 1) {
                            // Pan when zoomed
                            const deltaX = touchX - this.lastTouchX;
                            const deltaY = touchY - this.lastTouchY;
                            this.panX += deltaX;
                            this.panY += deltaY;
                            this.applyTransform();
                            this.lastTouchX = touchX;
                            this.lastTouchY = touchY;
                        } else if (!this.isAnimating) {
                            // Navigate when not zoomed
                            const deltaX = touchX - this.touchStartX;
                            if (Math.abs(deltaX) > 10) {
                                this.isDragging = true;
                            }
                        }
                    }
                }, { passive: false });
                
                container.addEventListener('touchend', (e) => {
                    if (this.isPinching) {
                        this.isPinching = false;
                    } else if (this.isDragging && this.zoomLevel === 1) {
                        this.touchEndX = e.changedTouches[0].clientX;
                        this.handleSwipe();
                    }
                    this.isDragging = false;
                }, { passive: true });
                
                // Click/Tap areas (only when not zoomed)
                document.getElementById('prev-area').addEventListener('click', () => {
                    if (!this.isDragging && this.zoomLevel === 1) {
                        this.prevPage();
                        this.showHint('prev');
                    }
                });
                
                document.getElementById('next-area').addEventListener('click', () => {
                    if (!this.isDragging && this.zoomLevel === 1) {
                        this.nextPage();
                        this.showHint('next');
                    }
                });
                
                // Zoom controls
                document.getElementById('zoom-in').addEventListener('click', () => {
                    this.setZoom(this.zoomLevel + this.zoomStep);
                });
                
                document.getElementById('zoom-out').addEventListener('click', () => {
                    this.setZoom(this.zoomLevel - this.zoomStep);
                });
                
                document.getElementById('zoom-reset').addEventListener('click', () => {
                    this.resetZoom();
                });
                
                // Back button
                document.getElementById('back-button').addEventListener('click', () => {
                    window.history.back();
                });
                
                // Keyboard navigation
                document.addEventListener('keydown', (e) => {
                    if (this.zoomLevel === 1) {
                        if (e.key === 'ArrowLeft') this.prevPage();
                        if (e.key === 'ArrowRight') this.nextPage();
                    }
                });
            }
            
            getDistance(touch1, touch2) {
                const dx = touch1.clientX - touch2.clientX;
                const dy = touch1.clientY - touch2.clientY;
                return Math.sqrt(dx * dx + dy * dy);
            }
            
            setZoom(newZoom) {
                this.zoomLevel = Math.max(this.minZoom, Math.min(this.maxZoom, newZoom));
                
                if (this.zoomLevel === 1) {
                    this.panX = 0;
                    this.panY = 0;
                }
                
                this.applyTransform();
            }
            
            resetZoom() {
                this.zoomLevel = 1;
                this.panX = 0;
                this.panY = 0;
                this.applyTransform();
            }
            
            applyTransform() {
                const currentPageEl = document.querySelector('.page.current img');
                if (currentPageEl) {
                    currentPageEl.style.transform = `scale(${this.zoomLevel}) translate(${this.panX / this.zoomLevel}px, ${this.panY / this.zoomLevel}px)`;
                }
            }
            
            handleSwipe() {
                const diff = this.touchStartX - this.touchEndX;
                
                if (Math.abs(diff) > this.dragThreshold) {
                    if (diff > 0 && this.currentPage < this.totalPages - 1) {
                        this.nextPage();
                    } else if (diff < 0 && this.currentPage > 0) {
                        this.prevPage();
                    }
                }
            }
            
            nextPage() {
                if (this.currentPage < this.totalPages - 1 && !this.isAnimating) {
                    this.isAnimating = true;
                    this.resetZoom();
                    
                    const currentPageEl = document.querySelector(`.page[data-page-num="${this.currentPage}"]`);
                    const nextPageEl = document.querySelector(`.page[data-page-num="${this.currentPage + 1}"]`);
                    
                    // Prepare and show next page immediately
                    nextPageEl.classList.remove('hidden');
                    nextPageEl.classList.add('current');
                    nextPageEl.style.transform = 'rotateY(0deg)';
                    nextPageEl.style.zIndex = '10';
                    
                    // Flip current page over the next page
                    currentPageEl.classList.add('flipping');
                    currentPageEl.style.zIndex = '30';
                    currentPageEl.style.transform = 'rotateY(0deg)';
                    
                    // Use setTimeout to trigger transition
                    setTimeout(() => {
                        currentPageEl.style.transform = 'rotateY(-180deg)';
                    }, 10);
                    
                    setTimeout(() => {
                        currentPageEl.classList.remove('current', 'flipping');
                        currentPageEl.classList.add('hidden');
                        currentPageEl.style.transform = '';
                        currentPageEl.style.zIndex = '';
                        
                        nextPageEl.style.zIndex = '20';
                        
                        this.currentPage++;
                        this.isAnimating = false;
                        this.updateUI();
                    }, 800);
                }
            }
            
            prevPage() {
                if (this.currentPage > 0 && !this.isAnimating) {
                    this.isAnimating = true;
                    this.resetZoom();
                    
                    const currentPageEl = document.querySelector(`.page[data-page-num="${this.currentPage}"]`);
                    const prevPageEl = document.querySelector(`.page[data-page-num="${this.currentPage - 1}"]`);
                    
                    // Keep current page visible behind
                    currentPageEl.style.zIndex = '10';
                    
                    // Prepare previous page for flip back
                    prevPageEl.classList.remove('hidden');
                    prevPageEl.classList.add('flipping', 'current');
                    prevPageEl.style.transform = 'rotateY(-180deg)';
                    prevPageEl.style.zIndex = '30';
                    
                    // Use setTimeout to trigger transition
                    setTimeout(() => {
                        prevPageEl.style.transform = 'rotateY(0deg)';
                    }, 10);
                    
                    setTimeout(() => {
                        currentPageEl.classList.remove('current');
                        currentPageEl.classList.add('hidden');
                        currentPageEl.style.zIndex = '';
                        
                        prevPageEl.classList.remove('flipping');
                        prevPageEl.style.zIndex = '20';
                        
                        this.currentPage--;
                        this.isAnimating = false;
                        this.updateUI();
                    }, 800);
                }
            }
            
            updateUI() {
                document.getElementById('current-page').textContent = this.currentPage + 1;
            }
            
            showHint(direction) {
                const hint = document.getElementById(`${direction}-hint`);
                hint.classList.add('show');
                setTimeout(() => {
                    hint.classList.remove('show');
                }, 300);
            }
            
            showInitialHints() {
                setTimeout(() => {
                    document.getElementById('next-hint').classList.add('show');
                    setTimeout(() => {
                        document.getElementById('next-hint').classList.remove('show');
                    }, 1500);
                }, 500);
            }
        }
        
        // Initialize flipbook when DOM is ready
        document.addEventListener('DOMContentLoaded', () => {
            new Flipbook();
        });
    </script>
</body>
</html>