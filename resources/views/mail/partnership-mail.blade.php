<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Partnership Submission</title>
</head>
<body style="margin:0;padding:0;background:#f4f4f5;font-family:Arial,sans-serif;color:#111827;">
    <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="background:#f4f4f5;padding:24px 12px;">
        <tr>
            <td align="center">
                <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="max-width:680px;background:#ffffff;border:1px solid #e5e7eb;border-radius:12px;overflow:hidden;">
                    <tr>
                        <td style="padding:20px 24px;background:#111827;">
                            <img src="https://mcasia.website.mcasiafoodtrade.ph/images/McAsia_White_Red_Logo.png" alt="McAsia" style="height:34px;width:auto;display:block;">
                        </td>
                    </tr>
                    <tr>
                        <td style="padding:24px;">
                            <p style="margin:0 0 8px;font-size:12px;letter-spacing:.08em;color:#b91c1c;font-weight:700;text-transform:uppercase;">Partnership Form</p>
                            <h1 style="margin:0 0 20px;font-size:24px;line-height:1.2;color:#111827;">New partnership submission received</h1>

                            <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="border-collapse:collapse;">
                                <tr>
                                    <td style="padding:10px 0;border-top:1px solid #e5e7eb;font-size:14px;color:#6b7280;width:180px;">Full Name</td>
                                    <td style="padding:10px 0;border-top:1px solid #e5e7eb;font-size:14px;color:#111827;font-weight:600;">{{ $data['name'] ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <td style="padding:10px 0;border-top:1px solid #e5e7eb;font-size:14px;color:#6b7280;">Address</td>
                                    <td style="padding:10px 0;border-top:1px solid #e5e7eb;font-size:14px;color:#111827;line-height:1.6;">
                                        {{ trim(($data['blk_no'] ?? '') . ' ' . ($data['street'] ?? '')) ?: '-' }}<br>
                                        {{ $data['barangay'] ?? '-' }}{{ !empty($data['subdivision']) ? ', ' . $data['subdivision'] : '' }}<br>
                                        {{ $data['country'] ?? '-' }}{{ !empty($data['zip_code']) ? ' - ' . $data['zip_code'] : '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding:10px 0;border-top:1px solid #e5e7eb;font-size:14px;color:#6b7280;">Mobile Number</td>
                                    <td style="padding:10px 0;border-top:1px solid #e5e7eb;font-size:14px;color:#111827;">{{ $data['mobile_number'] ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <td style="padding:10px 0;border-top:1px solid #e5e7eb;font-size:14px;color:#6b7280;">Landline Number</td>
                                    <td style="padding:10px 0;border-top:1px solid #e5e7eb;font-size:14px;color:#111827;">{{ $data['landline_number'] ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <td style="padding:10px 0;border-top:1px solid #e5e7eb;font-size:14px;color:#6b7280;">Business Name</td>
                                    <td style="padding:10px 0;border-top:1px solid #e5e7eb;font-size:14px;color:#111827;">{{ $data['business_name'] ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <td style="padding:10px 0;border-top:1px solid #e5e7eb;font-size:14px;color:#6b7280;">Business Address</td>
                                    <td style="padding:10px 0;border-top:1px solid #e5e7eb;font-size:14px;color:#111827;">{{ $data['business_address'] ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <td style="padding:10px 0;border-top:1px solid #e5e7eb;font-size:14px;color:#6b7280;">Business Number</td>
                                    <td style="padding:10px 0;border-top:1px solid #e5e7eb;font-size:14px;color:#111827;">{{ $data['business_number'] ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <td style="padding:10px 0;border-top:1px solid #e5e7eb;font-size:14px;color:#6b7280;">Business Website</td>
                                    <td style="padding:10px 0;border-top:1px solid #e5e7eb;font-size:14px;color:#111827;">{{ $data['business_website'] ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <td style="padding:10px 0;border-top:1px solid #e5e7eb;font-size:14px;color:#6b7280;">Business Email</td>
                                    <td style="padding:10px 0;border-top:1px solid #e5e7eb;font-size:14px;color:#111827;">{{ $data['business_email'] ?? '-' }}</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding:14px 24px;background:#f9fafb;border-top:1px solid #e5e7eb;font-size:12px;color:#6b7280;text-align:center;">
                            &copy; {{ date('Y') }} McAsia Foodtrade Corporation. All rights reserved.
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
