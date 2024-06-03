// search.js

document.addEventListener('DOMContentLoaded', function() {
    const searchForm = document.getElementById('search-form');
    const searchInput = document.getElementById('search-input');
    const searchResults = document.getElementById('search-results');
    const searchResultsList = document.getElementById('search-results-list');
    let noResultsMessage = document.getElementById('no-results-message');

    searchInput.addEventListener('input', function() {
        const query = searchInput.value;
        if (query.length >= 3) {
            fetch(`/search?query=${query}`)
                .then(response => response.json())
                .then(data => {
                    searchResultsList.innerHTML = '';
                    if (data.length === 0) {
                        showNoResultsMessage();
                    } else {
                        hideNoResultsMessage();
                        data.forEach(product => {
                            const li = document.createElement('li');
                            li.classList.add('cursor-pointer', 'py-2', 'hover:bg-gray-200');
                            li.textContent = product.title;
                            li.dataset.productId = product.id;
                            li.dataset.productTitle = product.title;
                            li.addEventListener('click', function() {
                                scrollToProduct(product.id);
                            });
                            searchResultsList.appendChild(li);
                        });
                        searchResults.classList.remove('hidden');
                    }
                });
        } else {
            hideNoResultsMessage();
            searchResults.classList.add('hidden');
        }
    });

    function showNoResultsMessage() {
        if (!noResultsMessage) {
            noResultsMessage = document.createElement('div');
            noResultsMessage.id = 'no-results-message';
            noResultsMessage.textContent = 'Ничего не найдено';
            searchResults.appendChild(noResultsMessage);
        } else {
            noResultsMessage.classList.remove('hidden');
        }
    }

    function hideNoResultsMessage() {
        if (noResultsMessage) {
            noResultsMessage.classList.add('hidden');
        }
    }

    function scrollToProduct(productId) {
        window.location.replace(`/#product-${productId}`);
        const productElement = document.getElementById(`product-${productId}`);
        if (productElement) {
            productElement.scrollIntoView({ behavior: 'smooth' });
            searchInput.value = '';
            searchResults.classList.add('hidden');
        }
    }

    document.addEventListener('click', function(event) {
        if (!searchForm.contains(event.target) && !searchResults.contains(event.target)) {
            searchResults.classList.add('hidden');
        }
    });
});
