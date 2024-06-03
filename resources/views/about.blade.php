@extends('includes.template')
@section('content')
    <div class="container">
    <div class="flex bg-white rounded-2xl p-4 flex-col lg:flex-row mt-5">
        <!-- Левая часть страницы -->
        <div class="lg:w-1/2 bg-gray-white p-6">
            <h2 class="text-2xl font-bold mb-4">О нас</h2>
            <p class="mb-4">IT Cafe всегда для вас.</p>
            <p class="mb-4">Контакты для связи:</p>
            <ul class="mb-4">
                <li><a class="text-[#3a86ff]" href="mailto:example@example.com">Email: 89564323321</a></li>
                <li><a class="text-[#3a86ff]" href="tel:+1234567890">Телефон: Feedback@mail.ru</a></li>
                <li>Адрес:г. Казань ул. Галеева, д. 3a</li>
            </ul>
            <p class="underline">Для дополнетельной ифнормации или по воросам сотрудничества обращаться по номеру телефона.</p>
        </div>

        <!-- Правая часть страницы -->
        <div class="lg:w-1/2">
            <!-- Встраиваем карта от Яндекс -->
            <div style="position:relative;overflow:hidden;"><a href="https://yandex.ru/maps/org/it_cafe/201834824895/?utm_medium=mapframe&utm_source=maps" style="color:#eee;font-size:12px;position:absolute;top:0px;">IT cafe</a><a href="https://yandex.ru/maps/43/kazan/category/cafe/184106390/?utm_medium=mapframe&utm_source=maps" style="color:#eee;font-size:12px;position:absolute;top:14px;">Кафе в Казани</a><iframe src="https://yandex.ru/map-widget/v1/?ll=49.178522%2C55.800813&mode=search&oid=201834824895&ol=biz&z=16.86" width="560" height="400" frameborder="1" allowfullscreen="true" style="position:relative;"></iframe></div>
        </div>
    </div>
    </div>
@endsection
