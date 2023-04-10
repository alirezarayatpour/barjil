{{--! Footer --}}
<div class="container-fluid mt-5" style="background-color: black;">
    <div class="container">
        <div class="row">
            <div class="footer-width">
                @foreach($logos as $logo)
                    @if($logo->position == 'منو پایین' and $logo->status == 1)
                        <img src="{{ asset('image/logo').'/'.$logo->image }}" alt="barjil" class="img-fluid mx-auto d-block">
                    @endif
                @endforeach
                <div class="text-footer">
                    @foreach($footerTexts as $footerText)
                        @if($footerText->status == 1)
                            {!! $footerText->body !!}
                        @endif
                    @endforeach
                </div>
                <p class="text-footer">
                    @foreach($contacts as $contact)
                        @if($contact->status == 1)
                            <i class="fa fa-phone"></i>
                            {{ $contact->phone }}
                        @endif
                    @endforeach
                </p>
            </div>
            <div class="footer-width">
                <div class="text-line-center-footer">
                    <h6>
                        @foreach($footerColumns as $footerColumn)
                            @if($footerColumn->column == 'ستون اول' and $footerColumn->status == 1)
                                {{ $footerColumn->title }}
                            @endif
                        @endforeach
                    </h6>
                </div>
                <div>
                    <ul class="item-footer">
                        @foreach($footerItems as $footerItem)
                            @if($footerItem->column == 'ستون اول' and $footerItem->status == 1)
                                <li><a href="{{ route('pages.'.$footerItem->link) }}">{{ $footerItem->item }}</a></li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="footer-width">
                <div class="text-line-center-footer">
                    <h6>
                        @foreach($footerColumns as $footerColumn)
                            @if($footerColumn->column == 'ستون دوم' and $footerColumn->status == 1)
                                {{ $footerColumn->title }}
                            @endif
                        @endforeach
                    </h6>
                </div>
                <div>
                    <ul class="item-footer">
                        @foreach($footerItems as $footerItem)
                            @if($footerItem->column == 'ستون دوم' and $footerItem->status == 1)
                                <li><a href="{{ route('pages.'.$footerItem->link) }}">{{ $footerItem->item }}</a></li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="footer-width">
                <div class="text-line-center-footer">
                    <h6>
                        @foreach($footerColumns as $footerColumn)
                            @if($footerColumn->column == 'ستون سوم' and $footerColumn->status == 1)
                                {{ $footerColumn->title }}
                            @endif
                        @endforeach
                    </h6>
                </div>
                <div>
                    <ul class="item-footer">
                        @foreach($footerItems as $footerItem)
                            @if($footerItem->column == 'ستون سوم' and $footerItem->status == 1)
                                <li><a href="{{ route('pages.'.$footerItem->link) }}">{{ $footerItem->item }}</a></li>
                            @endif
                        @endforeach
                    </ul>
                </div>
                <div>
                    <ul class="item-footer">
                        <div class="everything-center">

                            @foreach($socials as $social)
                                @if($social->status == 1)
                                    <a href="https://{{ $social->link }}" class="text-white">
                                        <sapn class="social everything-center" style="background-color: {{ $social->color }}">
                                            <i class="{{ $social->icon }}"></i>
                                        </sapn>
                                    </a>
                                @endif
                            @endforeach

                        </div>
                    </ul>
                </div>
            </div>
            <div class="footer-width">
                <div class="text-line-center-footer">
                    <h6>
                        @foreach($footerColumns as $footerColumn)
                            @if($footerColumn->column == 'ستون چهارم' and $footerColumn->status == 1)
                                {{ $footerColumn->title }}
                            @endif
                        @endforeach
                    </h6>
                </div>
                <div>
                    <ul class="item-footer">
                        @foreach($footerItems as $footerItem)
                            @if($footerItem->column == 'ستون چهارم' and $footerItem->status == 1)
                                <li><a href="{{ route('pages.'.$footerItem->link) }}">{{ $footerItem->item }}</a></li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
{{--! /Footer --}}
