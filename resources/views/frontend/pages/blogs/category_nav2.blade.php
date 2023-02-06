<!-- Post Header Section Start -->
<div class="post-header-section section mt-30 mb-30">
    <div class="container">
        <div class="row row-1 border-bottom-1">
            <div class="col-12">
                <div class="post-header category-header">

                    <div class="flex-1">
                        <!-- Title -->
                        <h3 class="title">{{ ucfirst( @$category->name )}} </h3>
                    </div>
                    <div class="meta fix category-single">
                        <div>
                            @foreach(categoryChildren(@$category->id) as $child)
                                <a href="{{route('blog.category',$child->slug)}}" class="meta-item category">{{$child->name}}</a>
                            @endforeach
                        </div>
                        <div class="pt-5 mb-hide">
                            <ol class="page-breadcrumb">
                                <li><a href="/">गृह पृष्ठ</a></li>
                                <li class="active">{{ ucfirst( @$category->name )}} </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
