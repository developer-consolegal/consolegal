@if ($seo)
    @section('title', $seo->meta_title)
    @section('description', $seo->meta_description )
@else
    @section('title','One stop solution for Startups and SMEs in India for Legal and Compliance needs | ConsoLegal')
    @section('description','One stop solution for Startups and SMEs in India for Legal and Compliance needs | ConsoLegal')
@endif
