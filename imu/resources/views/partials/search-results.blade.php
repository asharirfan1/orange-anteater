<div class="row">
    <div class="col-xs-12" style="text-align: center">
        <span class="search-results">результаты поиска по запросу <span class="query-string">{{ Request::input('queryString') }}</span>:
        {{ $searchCount }}</span><br>
        <a href="{{ $returnUrl }}" class="reset-search-link">Сбросить поиск</a>
    </div>
</div>
