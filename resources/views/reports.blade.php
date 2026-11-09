<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>البلاغات</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-4">

    <div class="max-w-3xl mx-auto flex justify-center gap-2 mb-4">
        <a href="/" class="px-4 py-2 rounded-lg bg-gray-100 text-gray-700">الرئيسية</a>
        <a href="/report" class="px-4 py-2 rounded-lg bg-gray-100 text-gray-700">إضافة بلاغ</a>
        <a href="/reports" class="px-4 py-2 rounded-lg bg-gray-100 text-gray-700">البلاغات</a>
    </div>

    <form action="/reports" method="GET" class="max-w-3xl mx-auto bg-white rounded-xl shadow p-3 flex gap-2 mb-4">
        <select name="type" class="border rounded-lg px-2 py-2">
            <option value="">كل الأنواع</option>
            <option value="كهرباء" {{ request('type') == 'كهرباء' ? 'selected' : '' }}>كهرباء</option>
            <option value="مياه" {{ request('type') == 'مياه' ? 'selected' : '' }}>مياه</option>
            <option value="صرف صحي" {{ request('type') == 'صرف صحي' ? 'selected' : '' }}>صرف صحي</option>
            <option value="طريق" {{ request('type') == 'طريق' ? 'selected' : '' }}>طريق</option>
            <option value="أخرى" {{ request('type') == 'أخرى' ? 'selected' : '' }}>أخرى</option>
        </select>
        <input type="text" name="search" value="{{ request('search') }}" placeholder="ابحث عن بلاغ..." class="flex-1 border rounded-lg px-3 py-2">
        <button class="bg-blue-600 text-white px-4 py-2 rounded-lg font-bold">بحث</button>
    </form>

    <div class="max-w-3xl mx-auto">
        <h1 class="text-2xl font-bold text-center mb-4">كل البلاغات ({{ $reports->count() }})</h1>
        <a href="/report" class="block text-center bg-blue-600 text-white p-3 rounded mb-4 font-bold">+ أضف بلاغ جديد</a>

        @foreach($reports as $report)
            <div class="bg-white p-4 rounded-xl shadow mb-3">

                {{-- صورة البلاغ - هنا مكانها الصح --}}
                @if($report->image)
                    <img src="{{ asset('storage/' . $report->image) }}" class="w-full h-48 object-cover rounded-lg mb-2">
                @endif

                <div class="flex justify-between">
                    <h2 class="font-bold text-lg">{{ $report->title }}</h2>
                    <span class="bg-red-100 text-red-700 px-2 py-1 rounded text-sm">{{ $report->type }}</span>
                </div>

                <p class="text-gray-600 mt-2">{{ $report->description }}</p>

                <div class="flex justify-between text-sm text-gray-500 mt-3">
                    <span>📍 {{ $report->location }}</span>
                    <span>📞 {{ $report->phone }}</span>
                    
                </div>
<div style="display:flex; gap:10px; margin-top:10px;">

    {{-- زر تغيير الحالة --}}
    <form action="/reports/{{ $report->id }}/toggle" method="POST">
        @csrf
        <button style="background:#16a34a; color:#fff; padding:8px 15px; border:none; border-radius:8px; cursor:pointer;">
            @if($report->status == 'تم الحل')
                رجع قيد المعالجة
            @else
                ✅ تم الحل
            @endif
        </button>
    </form>

    {{-- زر الحذف --}}
    <form action="/reports/{{ $report->id }}" method="POST" onsubmit="return confirm('متأكد داير تحذف البلاغ ده؟')">
        @csrf
        @method('DELETE')
        <button style="background:#dc2626; color:#fff; padding:8px 15px; border:none; border-radius:8px; cursor:pointer;">
            🗑️ حذف
        </button>
    </form>

</div>
                <div class="text-xs text-gray-400 mt-2">
                    {{ $report->created_at->diffForHumans() }} - الحالة: {{ $report->status ?? 'قيد المعالجة' }}
                </div>

            </div>
        @endforeach

        @if($reports->count() == 0)
            <p class="text-center text-gray-500 bg-white p-6 rounded-xl">لا توجد بلاغات حالياً</p>
        @endif

    </div>

</body>
</html>