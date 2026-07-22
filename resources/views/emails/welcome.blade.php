<!DOCTYPE html>
<html>
<head><meta charset="utf-8"></head>
<body style="margin:0; padding:0; background-color:#f4f4f7; font-family:Arial, sans-serif;">
    <table width="100%" cellpadding="0" cellspacing="0" style="padding:24px 0;">
        <tr>
            <td align="center">
                <table width="600" cellpadding="0" cellspacing="0" style="background:#fff; border-radius:8px; overflow:hidden;">
                    <tr>
                        <td style="background:#4f46e5; padding:24px 32px;">
                            <h1 style="margin:0; color:#fff; font-size:22px;">Welcome to Todo List App!</h1>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding:32px;">
                            <p style="font-size:16px; color:#333;">Hi {{ $user->name }},</p>
                            <p style="font-size:16px; color:#333;">
                                Thanks for joining Todo List App! You can now create tasks,
                                organize them with categories and tags, and track what's done.
                            </p>
                            <a href="{{ url('/tasks') }}"
                               style="display:inline-block; background:#4f46e5; color:#fff; text-decoration:none; padding:12px 24px; border-radius:6px; font-size:15px;">
                                Go to My Tasks
                            </a>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>