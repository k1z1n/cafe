<footer class="footer bg-gray-700 text-white">
    <div class="container flex flex-col gap-y-2">
        <div class="mt-6 flex justify-between">
            <a href="/" class="flex items-center gap-2">
                <img src="{{ asset('img/loog.svg') }}" alt="Логотип" height="40" class="w-20">
                <p class="text-white text-xl sm:block xs:hidden">IT-CAFE</p>
            </a>
            <div class="flex gap-x-2 items-center flex-col">
                <div>
                    <a href="tel:89564323321">Телефон: 89564323321</a>
                    <a href="mailto:Feedback@mail.ru">Почта: Feedback@mail.ru</a>
                </div>
                <div>
                <a href="{{ route('about') }}">О нас</a>
                <a href="" download="{{ asset('file/pass.doc') }}">Условия пользования</a>
                </div>
            </div>
        </div>
        <div class="container mx-auto py-6 text-center">
            <p>&copy; 2024 Магазин. Все права защищены.</p>
        </div>
    </div>
</footer>
