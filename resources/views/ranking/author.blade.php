@extends('layouts.main')

@section('content')

    <div class="uk-text-center">
        <h1 class="uk-heading-medium">Author Ranking</h1>
        <p>Top Scorepost Authors</p>
    </div>
    <br><br>

    <div class="uk-overflow-auto">
        <table class="uk-table uk-table-small uk-table-divider uk-table-justify">
            <thead>
                <tr>
                    <th>#</th>
                    <th>name</th>
                    <th class="uk-text-nowrap">
                        posts
                        @if ($sort == "posts")
                            <a href="{{ url('/ranking/author/posts') }}" class="fas fa-sort-down reddit" alt="sort descending" style="text-decoration: none"></a>
                        @else
                            <a href="{{ url('/ranking/author/posts') }}" class="fas fa-sort-down uk-text-muted" alt="sort descending" style="text-decoration: none"></a>
                        @endif
                    </th>
                    <!--
                    <th class="uk-text-nowrap">
                        spicy
                        @if ($sort == "controversy")
                            <a href="{{ url('/ranking/author/controversy') }}" class="fas fa-sort-down reddit" alt="sort descending" style="text-decoration: none"></a>
                        @else
                            <a href="{{ url('/ranking/author/controversy') }}" class="fas fa-sort-down uk-text-muted" alt="sort descending" style="text-decoration: none"></a>
                        @endif
                    </th>
                    -->
                    <th class="uk-text-nowrap">
                        total pp
                        @if ($sort == "score")
                            <a href="{{ url('/ranking/author/score') }}" class="fas fa-sort-down reddit" alt="sort descending" style="text-decoration: none"></a>
                        @else
                            <a href="{{ url('/ranking/author/score') }}" class="fas fa-sort-down uk-text-muted" alt="sort descending" style="text-decoration: none"></a>
                        @endif
                    </th>
                    <th class="uk-text-nowrap">
                        avg pp
                        @if ($sort == "score_avg")
                            <a href="{{ url('/ranking/author/score_avg') }}" class="fas fa-sort-down reddit" alt="sort descending" style="text-decoration: none"></a>
                        @else
                            <a href="{{ url('/ranking/author/score_avg') }}" class="fas fa-sort-down uk-text-muted" alt="sort descending" style="text-decoration: none"></a>
                        @endif
                    </th>
                </tr>
            </thead>

            <tbody>
                @foreach($posts as $post)
                    <tr>
                        <td>{{ ++$rank }}</td>
                        <td><a href="{{ url('/author/'.$post->author) }}" style="text-decoration: none">{{ $post->author }}</a></td>
                        <td>{{ $post->posts }}</td>
                        <!--<td>{{ number_format($post->controversy, 2) }}%</td>-->
                        <td>{{ round($post->score) }}</td>
                        <td>{{ round($post->score_avg) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <ul class="uk-pagination uk-flex-center">
        <li><a href="{{ $posts->previousPageUrl() }}" ><span uk-pagination-previous></span></a></li>
        @if (($posts->total() > 7) && ($posts->currentPage() > 5))
            <li><a href="{{ $posts->url(1) }}">1</a></li>
            <li class="uk-disabled"><span>...</span></li>
        @endif

        @foreach($pageUrls as $pageNo => $pageUrl)
            @if ($posts->currentPage() === $pageNo)
                <li class="uk-active">
            @else
                <li>
                    @endif
                    <a href="{{ $pageUrl }}">{{ $pageNo }}</a>
                </li>
                @endforeach
                <li><a href="{{ $posts->nextPageUrl() }}"><span uk-pagination-next></span></a></li>
    </ul>
@endsection
