<div class="col-12 d-flex justify-content-center" dir="ltr">
    <ul class="pagination">

        <li class="page-item">
            <a class="page-link"
                href={{ route('category.show-posts', ['id' => $category, 'page' => $currentPage - 1]) }}
                aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
            </a>
        </li>

        @for ($page = 1; $page <= $pages; $page++)
            <li class="page-item {{ $page == $currentPage ? 'active' : '' }}"><a class="page-link"
                    href={{ route('category.show-posts', ['id' => $category, 'page' => $page]) }}>{{ $page }}</a>
            </li>
        @endfor

        <li class="page-item">
            <a class="page-link"
                href={{ route('category.show-posts', ['id' => $category, 'page' => $currentPage + 1]) }}
                aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
            </a>
        </li>

    </ul>
</div>
