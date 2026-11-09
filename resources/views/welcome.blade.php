<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>بلاغات أم درمان</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-b from-blue-600 to-blue-800 min-h-screen text-white flex flex-col items-center justify-center p-4">
<div class="w-full max-w-3xl mx-auto bg-white/10 rounded-xl p-2 flex justify-center gap-2 mb-4 text-sm font-bold">
    <a href="/" class="px-4 py-2 rounded-lg bg-white text-blue-700">🏠 الرئيسية</a>
    <a href="/report" class="px-4 py-2 rounded-lg bg-white text-blue-700">+ بلاغ جديد</a>
    <a href="/reports" class="px-4 py-2 rounded-lg bg-white text-blue-700">📋 كل البلاغات</a>
</div>
    <div class="text-center">
        <div class="text-6xl mb-4">🚨</div>
        <h1 class="text-4xl font-bold mb-2">بلاغات أم درمان</h1>
        <div class="flex justify-center gap-3 my-4">
    <div class="bg-white rounded-xl shadow px-4 py-3 text-center">
        <div class="text-2xl font-black text-blue-600">{{ $total ?? 0 }}</div>
        <div class="text-xs text-gray-500">كل البلاغات</div>
    </div>
    <div class="bg-white rounded-xl shadow px-4 py-3 text-center">
        <div class="text-2xl font-black text-green-600">{{ $solved ?? 0 }}</div>
        <div class="text-xs text-gray-500">✅ اتحلت</div>
    </div>
    <div class="bg-white rounded-xl shadow px-4 py-3 text-center">
        <div class="text-2xl font-black text-yellow-600">{{ $pending ?? 0 }}</div>
        <div class="text-xs text-gray-500">⏳ لسه قاعدة</div>
    </div>
</div>
        <p class="text-blue-200 text-lg mb-8">بلغ عن أي مشكلة في حيك، وساعد جيرانك</p>

        <div class="flex flex-col gap-3 w-72 mx-auto">
            <a href="/report" class="bg-white text-blue-700 font-bold p-4 rounded-2xl text-lg shadow-lg">
                + بلغ الآن
            </a>
            <a href="/reports" class="bg-blue-500 border border-blue-400 font-bold p-4 rounded-2xl text-lg">
                📋 شوف كل البلاغات
            </a>
        </div>

        <div class="flex justify-center gap-6 mt-10 text-sm text-blue-200">
            <div>⚡ كهرباء</div>
            <div>💧 مياه</div>
            <div>🔥 حريق</div>
            <div>🚨 حوادث</div>
        </div>
    </div>

    <p class="absolute bottom-4 text-blue-300 text-xs">صُنع في أم درمان ❤️</p>

</body>
</html>