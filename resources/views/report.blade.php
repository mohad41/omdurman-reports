<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>بلاغ جديد</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-4">

    <div class="max-w-2xl mx-auto flex justify-center gap-2 mb-4">
        <a href="/" class="px-4 py-2 rounded-lg bg-white text-gray-700 shadow">الرئيسية</a>
        <a href="/report" class="px-4 py-2 rounded-lg bg-blue-600 text-white shadow">+ بلاغ جديد</a>
        <a href="/reports" class="px-4 py-2 rounded-lg bg-white text-gray-700 shadow">كل البلاغات</a>
    </div>

    <div class="max-w-2xl mx-auto bg-white rounded-xl shadow p-6">
        <h1 class="text-2xl font-bold text-center mb-6">بلاغ جديد</h1>

        @if(session('success'))
            <div class="bg-green-100 text-green-700 p-3 rounded-lg mb-4 text-center">
                {{ session('success') }}
            </div>
        @endif

        {{-- مهم جداً: enctype عشان الصورة تترفع --}}
        <form method="POST" action="/report" enctype="multipart/form-data" class="space-y-4">
            @csrf

            <div>
                <label class="block text-right text-sm font-bold mb-1">عنوان البلاغ</label>
                <input type="text" name="title" required placeholder="مثلا: انقطاع كهرباء" class="w-full border rounded p-2">
            </div>

            <div>
                <label class="block text-right text-sm font-bold mb-1">نوع البلاغ</label>
                <select name="type" required class="w-full border rounded p-2">
                    <option value="">اختر نوع البلاغ</option>
                    <option value="كهرباء">كهرباء</option>
                    <option value="مياه">مياه</option>
                    <option value="صرف صحي">صرف صحي</option>
                    <option value="طريق">طريق</option>
                    <option value="أخرى">أخرى</option>
                </select>
            </div>

            <div>
                <label class="block text-right text-sm font-bold mb-1">الموقع</label>
                <input type="text" name="location" required placeholder="الموقع - أم درمان، الخرطوم" class="w-full border rounded p-2">
            </div>

            <div>
                <label class="block text-right text-sm font-bold mb-1">رقم التلفون (اختياري)</label>
                <input type="text" name="phone" placeholder="رقم التلفون (اختياري)" class="w-full border rounded p-2">
            </div>

            <div>
                <label class="block text-right text-sm font-bold mb-1">وصف البلاغ</label>
                <textarea name="description" required rows="4" placeholder="وصف البلاغ..." class="w-full border rounded p-2"></textarea>
            </div>

            {{-- مكان الصورة - هنا الصح --}}
            <div>
                <label class="block text-right text-sm font-bold mb-1">📸 صورة البلاغ (اختياري)</label>
                <input type="file" name="image" accept="image/*" class="w-full border rounded p-2 bg-white">
            </div>

            <button type="submit" class="w-full bg-blue-600 text-white p-3 rounded font-bold">ارسال البلاغ</button>
        </form>
    </div>

</body>
</html>