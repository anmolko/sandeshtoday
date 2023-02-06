<div class="comment-block">
    <div class="block-header">
        <div class="title">
{{--            <h2>Comments</h2>--}}
{{--            <div class="tag">12</div>--}}
        </div>
        <div class="group-radio">

{{--            <div class="head comment-head">--}}
{{--                <ul class="post-block-tab-list feature-post-tab-list nav d-none d-md-block">--}}
{{--                    <li class="nav-item"><a class="active" data-bs-toggle="tab" href="#feature-cat-1">Fashion</a></li>--}}
{{--                    <li class="nav-item"><a data-bs-toggle="tab" href="#feature-cat-2" class="">Health</a></li>--}}
{{--                </ul>--}}
{{--            </div>--}}

{{--            <span class="button-radio">--}}
{{--                <input id="latest" name="latest" type="radio" checked>--}}
{{--                <label for="latest">Latest</label>--}}
{{--            </span>--}}
{{--            <span class="button-radio">--}}
{{--                <input id="popular" name="latest" type="radio">--}}
{{--                <label for="popular">Popular</label>--}}
{{--            </span>--}}
        </div>
    </div>


    <div class="writing">
        {!! Form::open(['route' => 'comments.store','method'=>'post','class'=>'needs-validation','id'=>'slider-list-form','novalidate'=>'','enctype'=>'multipart/form-data']) !!}

            <input type="hidden" class="form-control" name="user_id" id="user_id" value="{{ ( Auth::user()->user_type == 'viewer') ? Auth::user()->id :1}}" readonly required>
            <input type="hidden" class="form-control" name="blog_id" id="blog_id" value="{{@$singleBlog->id}}" readonly required>
            <textarea name="comment" class="textarea" rows="8" required></textarea><br/>
            <div class="footer">
                <div class="group-button">
                    <button type="submit" class="btn primary" id="send-comment">प्रतिक्रिया दिनुहोस्</button>
                </div>
            </div>
        {!! Form::close() !!}
    </div>


    @foreach($singleBlog->comments as $comment)
        <div class="comment">
            <div class="user-banner">
                <div class="user">
                    @if(@$comment->user->image && str_contains(@$comment->user->image, 'https'))
                        <img class="avatar rounded-circle default"
                             src="{{@$comment->user->image}}"/>
                    @elseif(@$comment->user->image)
                        <img class="avatar rounded-circle social"
                             src="{{asset('/images/user/'.@$comment->user->image)}}"/>
                    @else
                        <div class="avatar" style="background-color:#fff5e9;border-color:#ffe0bd; color:#F98600">
                            {{getFirstLetters($comment->user->name)}}
                            {{--                        <span class="stat green"></span>--}}
                        </div>
                    @endif

                    <h5>{{ $comment->user->name }}</h5>
                </div>
                <button class="btn dropdown"><i class="ri-more-line"></i></button>
            </div>
            <div class="content">
                <p>
                    {{@$comment->comment}}
                </p>
            </div>

            <div class="footer">
                <div class="reactions {{ ($comment->haslikedordisliked(Auth::user()->id)) ? "disabled-reaction":""}}">
                    <button class="btn btn-like react {{ ($comment->hasliked(Auth::user()->id)) ? "active":""}}" id="saveLikeDislike" data-type="like" data-user="{{Auth::user()->id}}"  data-comment="{{ $comment->id}}">
                        <i class="fa fa-thumbs-up" aria-hidden="true"></i>
                        <span class="like-count-{{ $comment->id}}">{{ ($comment->likes()>0) ? $comment->likes():""}}</span>
                    </button>
                    <button class="btn btn-dislike react {{ ($comment->hasdisliked(Auth::user()->id)) ? "active":""}}" id="saveLikeDislike" data-type="dislike" data-user="{{Auth::user()->id}}"  data-comment="{{ $comment->id}}">
                        <i class="fa fa-thumbs-down" aria-hidden="true"></i>
                        <span class="dislike-count-{{ $comment->id}}">{{  ($comment->dislikes()>0) ? $comment->dislikes():"" }}</span>
                    </button>
                </div>
                <div class="divider"></div>
                <button type="button" class="replybutton" data-commentbox="panel-{{@$comment->id}}" data-userid="{{@$comment->id}}">Reply</button>
                <div class="divider"></div>
                <span class="is-mute">{{@$comment->getCommentedAgoinNepali()}}</span>
            </div>

            <div class="replybox writing" style="display:none" id="panel-{{@$comment->id}}">
                {!! Form::open(['route' => 'comments.store','method'=>'post','class'=>'needs-validation','id'=>'slider-list-form','novalidate'=>'','enctype'=>'multipart/form-data']) !!}
                    <input type="hidden" class="form-control" name="user_id" id="user_id" value="{{ ( Auth::user()->user_type == 'viewer') ? Auth::user()->id :1}}" readonly required>
                    <input type="hidden" class="form-control" name="blog_id" id="blog_id" value="{{@$singleBlog->id}}" readonly required>
                    <input type="hidden" class="form-control" name="parent_id" id="parent_id_{{@$comment->id}}" value="{{@$comment->id}}" readonly required>
                    <textarea cols="35" name="comment" class="textarea" rows="8" required></textarea><br/>
                    <div class="footer">
                        <div class="group-button">
                            <button class="btn primary">प्रतिक्रिया दिनुहोस्</button>
                            <button type="button" class="cancelbutton btn secondary">Cancel</button>
                        </div>
                    </div>
                {!! Form::close() !!}

            </div>
        </div>
        @if(count($comment->replies)>0)
            @foreach($comment->replies as $reply)
                <div class="reply comment">
                    <div class="user-banner">
                        <div class="user">
                            <div class="avatar">
                                @if(@$reply->user->image && str_contains(@$reply->user->image, 'https'))
                                    <img class="avatar rounded-circle"
                                         src="{{@$reply->user->image}}"/>
                                @elseif(@$reply->user->image)
                                    <img class="avatar rounded-circle"
                                         src="{{asset('/images/user/'.@$reply->user->image)}}"/>
                                @else
                                    <div class="avatar" style="background-color:#fff5e9;border-color:#ffe0bd; color:#F98600">
                                        {{getFirstLetters($reply->user->name)}}
                                        {{--                        <span class="stat green"></span>--}}
                                    </div>
                                @endif
                                {{--                                <span class="stat green"></span>--}}
                            </div>
                            <h5>{{ @$reply->user->name }}</h5>
                        </div>
                        <button class="btn dropdown"><i class="ri-more-line"></i></button>
                    </div>
                    <div class="content">
                        <p><a class="tagged-user">@ {{ $comment->user->name }}</a>
                        {{@$reply->comment}}
                        </p>
                    </div>
                    <div class="footer">
                        <button class="btn"><i class="ri-emotion-line"></i></button>
                        <div class="reactions {{ ($reply->haslikedordisliked(Auth::user()->id)) ? "disabled-reaction":""}}">
                            <button class="btn btn-like react {{ ($reply->hasliked(Auth::user()->id)) ? "active":""}}" id="saveLikeDislike" data-type="like" data-user="{{Auth::user()->id}}" data-comment="{{ $reply->id}}">
                                <i class="fa fa-thumbs-up" aria-hidden="true"></i>
                                <span class="like-count-{{ $reply->id}}">{{  ($reply->likes()>0) ? $reply->likes():"" }}</span>
                            </button>
                            <button class="btn btn-dislike react {{ ($reply->hasdisliked(Auth::user()->id)) ? "active":""}}" id="saveLikeDislike" data-type="dislike" data-user="{{Auth::user()->id}}" data-comment="{{ $reply->id}}">
                                <i class="fa fa-thumbs-down" aria-hidden="true"></i>
                                <span class="dislike-count-{{$reply->id}}">{{  ($reply->dislikes()>0) ? $reply->dislikes():"" }}</span>
                            </button>
                        </div>
                        <div class="divider"></div>
                        <span class="is-mute">{{@$reply->getCommentedAgoinNepali()}}</span>
                    </div>
                </div>
            @endforeach
        @endif
    @endforeach

{{--    <div class="tab-content">--}}

{{--        <!-- Tab Pane Start-->--}}
{{--        <div class="tab-pane fade active show" id="feature-cat-1">--}}

{{--            <div class="row">--}}

{{--              --}}
{{--            </div>--}}

{{--        </div><!-- Tab Pane End-->--}}

{{--        <!-- Tab Pane Start-->--}}
{{--        <div class="tab-pane fade" id="feature-cat-2">--}}



{{--        </div><!-- Tab Pane End-->--}}

{{--    </div>--}}
</div>
