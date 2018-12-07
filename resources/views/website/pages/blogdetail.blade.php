

   @extends('website/index')

   @section('contentMyPage')
        <div class="header-empty-space"></div>

        <div class="container">
            <div class="empty-space col-xs-b15 col-sm-b30"></div>
            <div class="breadcrumbs">
                <a href="#">home</a>
                <a href="#">blog</a>
            </div>
            <div class="empty-space col-xs-b15 col-sm-b50 col-md-b100"></div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-sm-8">
                            <div class="simple-article size-1 grey uppercase col-xs-b10">apr 07 / 15 &nbsp;&nbsp;<a class="color" href="#">john wick</a> &nbsp;&nbsp;<a class="color" href="#">Gadgets</a></div>
                            <h1 class="h3 col-xs-b5 col-sm-b30">some post title here</h1>
                        </div>
                        <div class="col-sm-4 col-sm-text-right">
                            <div class="blog-comments"><i class="fa fa-comment-o" aria-hidden="true"></i> 5 &nbsp;&nbsp;&nbsp;<i class="fa fa-heart-o" aria-hidden="true"></i> 20</div>
                        </div>
                    </div>
                    <div class="simple-article size-2">
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe src="https://player.vimeo.com/video/47911018?color=b8cd06&amp;portrait=0"></iframe>
                        </div>
                        <h5>Praesent lobortis leo mi</h5>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque faucibus, lacus a pretium facilisis, urna lectus efficitur quam, ac posuere justo leo nec diam. Integer dapibus dolor non arcu consectetur volutpat. Nunc auctor, mi vitae cursus tempor, ipsum tortor sagittis ante, nec euismod massa nisl in mi. Quisque sed dignissim turpis. Vestibulum et risus nec dolor maximus tempor nec vel lorem.</p>
                        <p>Etiam lobortis, sapien et aliquam scelerisque, sapien augue mattis orci, dignissim varius augue nisi ut lorem. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nulla facilisi. Donec porttitor semper dictum. Ut sed sapien aliquam.</p>
                        <h5>In hac habitasse platea dictumst</h5>
                        <p>Aliquam eu pellentesque libero. Morbi ipsum diam, vestibulum sit amet sapien a, euismod fermentum dolor. Nunc accumsan sed dolor nec gravida. Morbi maximus leo eu semper ultrices. Nam ornare ultricies dapibus. Vestibulum consectetur iaculis suscipit. Integer eget rhoncus augue.</p>
                        <div class="swiper-container" data-auto-height="1">
                            <div class="swiper-button-prev hidden"></div>
                            <div class="swiper-button-next hidden"></div>
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <img class="image-thumbnail" src="img/thumbnail-79.jpg" alt="" />
                                </div>
                                <div class="swiper-slide">
                                    <img class="image-thumbnail" src="img/thumbnail-77.jpg" alt="" />
                                </div>
                                <div class="swiper-slide">
                                    <img class="image-thumbnail" src="img/thumbnail-78.jpg" alt="" />
                                </div>
                            </div>
                            <div class="swiper-pagination middle"></div>
                        </div>
                        <p>In hac habitasse platea dictumst. Quisque eleifend dolor et diam gravida mollis vel vel lorem. Curabitur at volutpat quam. Ut ut dui lectus. Vivamus neque enim, tempus et diam quis, mollis accumsan erat. Proin risus orci, euismod sit amet tristique vel, accumsan sed purus. Mauris dictum rutrum felis id fermentum. Nullam a lobortis nunc, quis viverra eros. Quisque id mauris urna. Duis gravida ex elit, eget fringilla velit luctus sit amet. Duis scelerisque, risus ut mollis imperdiet, lacus velit tempus erat, at sagittis felis urna eu nisl. Praesent sed molestie purus, in scelerisque magna.</p>
                        <ul>
                            <li>In hac habitasse platea dictumst.</li>
                            <li>Quisque eleifend dolor et diam gravida mollis vel vel lorem.</li>
                            <li>Curabitur at volutpat quam. Ut ut dui lectus. Vivamus neque enim, tempus et diam quis, mollis accumsan erat. Proin risus orci, euismod sit amet tristique vel, accumsan sed purus. Mauris dictum rutrum felis id fermentum.</li>
                            <li>Nullam a lobortis nunc, quis viverra eros.</li>
                            <li>Quisque id mauris urna. Duis gravida ex elit, eget fringilla velit luctus sit amet.</li>
                            <li>Duis scelerisque, risus ut mollis imperdiet, lacus velit tempus erat, at sagittis felis urna eu nisl.</li>
                            <li>Praesent sed molestie purus, in scelerisque magna.</li>
                        </ul>
                        <ol>
                            <li>In hac habitasse platea dictumst.</li>
                            <li>Quisque eleifend dolor et diam gravida mollis vel vel lorem.</li>
                            <li>Curabitur at volutpat quam. Ut ut dui lectus. Vivamus neque enim, tempus et diam quis, mollis accumsan erat. Proin risus orci, euismod sit amet tristique vel, accumsan sed purus. Mauris dictum rutrum felis id fermentum.</li>
                            <li>Nullam a lobortis nunc, quis viverra eros.</li>
                            <li>Quisque id mauris urna. Duis gravida ex elit, eget fringilla velit luctus sit amet.</li>
                            <li>Duis scelerisque, risus ut mollis imperdiet, lacus velit tempus erat, at sagittis felis urna eu nisl.</li>
                            <li>Praesent sed molestie purus, in scelerisque magna.</li>
                        </ol>
                    </div>
                    <div class="empty-space col-xs-b30"></div>
                    <div class="row">
                        <div class="col-sm-6 col-xs-b15 col-sm-b0">
                            <div class="tags light clearfix">
                                <span class="title">tags:</span>
                                <a class="tag">headphoness</a>
                                <a class="tag">accessories</a>
                                <a class="tag">new</a>
                            </div>
                        </div>
                        <div class="col-sm-6 col-sm-text-right">
                            <div class="follow light">
                                <span class="title">share:</span>
                                <a class="entry" href="#"><i class="fa fa-facebook"></i></a>
                                <a class="entry" href="#"><i class="fa fa-twitter"></i></a>
                                <a class="entry" href="#"><i class="fa fa-linkedin"></i></a>
                                <a class="entry" href="#"><i class="fa fa-google-plus"></i></a>
                                <a class="entry" href="#"><i class="fa fa-pinterest-p"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="empty-space col-xs-b35 col-md-b70"></div>
                    <div class="empty-space col-xs-b35 col-md-b70"></div>

                    <div class="simple-article size-3 grey uppercase col-xs-b5">related posts</div>
                    <div class="h3">something interesting too</div>
                    <div class="title-underline left"><span></span></div>
                    <div class="empty-space col-xs-b35"></div>

                    <div class="row">
                        <div class="col-sm-6 col-xs-b30 col-sm-b0">
                            <div class="icon-description-shortcode style-2">
                                <a href="#" class="image-icon simple-mouseover rounded-image">
                                    <img class="image-thumbnail rounded-image" src="img/thumbnail-80.jpg" alt="" />
                                </a>
                                <div class="content">
                                    <h6 class="title h6"><a href="#">Phasellus rhoncus in nunc sit</a></h6>
                                    <div class="subtitle simple-article size-1 grey uppercase col-xs-b10">apr 07 / 15 &nbsp;&nbsp;<a class="color" href="#">john wick</a> &nbsp;&nbsp;<a class="color" href="#">Gadgets</a></div>
                                    <div class="description simple-article size-2">Etiam mollis tristique mi ac ultrices. Morbi vel neque eget lacus sollicitudin facilisis. Lorem ipsum dolor sit amet semper ante vehicula</div>
                                    <a class="button size-1 style-3" href="#">
                                        <span class="button-wrapper">
                                            <span class="icon"><img src="img/icon-4.png" alt=""></span>
                                            <span class="text">learn more</span>
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="icon-description-shortcode style-2">
                                <a href="#" class="image-icon simple-mouseover rounded-image">
                                    <img class="image-thumbnail rounded-image" src="img/thumbnail-81.jpg" alt="" />
                                </a>
                                <div class="content">
                                    <h6 class="title h6"><a href="#">In hac habitasse platea dictumst</a></h6>
                                    <div class="subtitle simple-article size-1 grey uppercase col-xs-b10">apr 07 / 15 &nbsp;&nbsp;<a class="color" href="#">john wick</a> &nbsp;&nbsp;<a class="color" href="#">Gadgets</a></div>
                                    <div class="description simple-article size-2">Etiam mollis tristique mi ac ultrices. Morbi vel neque eget lacus sollicitudin facilisis. Lorem ipsum dolor sit amet semper ante vehicula</div>
                                    <a class="button size-1 style-3" href="#">
                                        <span class="button-wrapper">
                                            <span class="icon"><img src="img/icon-4.png" alt=""></span>
                                            <span class="text">learn more</span>
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="empty-space col-xs-b35 col-md-b70"></div>
                    <div class="empty-space col-xs-b35 col-md-b70"></div>

                    <div class="simple-article size-3 grey uppercase col-xs-b5">testimonials</div>
                    <div class="h3">here 3 testimonials</div>
                    <div class="title-underline left"><span></span></div>

                    <div class="empty-space col-xs-b15 col-md-b50"></div>

                    <div class="comments-wrapper">
                        <div class="comment-entry">
                            <div class="comment-top">
                                <img class="image" src="img/thumbnail-82.jpg" alt="" />
                                <div class="content">
                                    <h6 class="h6 col-xs-b5">Dorian gray</h6>
                                    <div class="simple-article size-1 grey uppercase">20:45 apr 07 / 15</div>
                                </div>
                                <div class="simple-article size-2">Sed sodales sed orci molestie tristique. Nunc dictum, erat id molestie vestibulum, ex leo vestibulum justo, luctus tempor erat sem quis diam. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean efficitur vulputate elit.</div>
                                <a class="button size-1 style-5" href="#">
                                    <span class="button-wrapper">
                                        <span class="icon"><i class="fa fa-comment-o" aria-hidden="true"></i></span>
                                        <span class="text">reply</span>
                                    </span>
                                </a>
                            </div>
                            <div class="empty-space col-xs-b35"></div>
                            <div class="comment-entry">
                                <div class="comment-top">
                                    <img class="image" src="img/thumbnail-83.jpg" alt="" />
                                    <div class="content">
                                        <h6 class="h6 col-xs-b5">alan doe</h6>
                                        <div class="simple-article size-1 grey uppercase">20:45 apr 07 / 15</div>
                                    </div>
                                    <div class="simple-article size-2">Sed sodales sed orci molestie tristique. Nunc dictum, erat id molestie vestibulum, ex leo vestibulum justo, luctus tempor erat sem quis diam. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean efficitur vulputate elit.</div>
                                    <a class="button size-1 style-5" href="#">
                                        <span class="button-wrapper">
                                            <span class="icon"><i class="fa fa-comment-o" aria-hidden="true"></i></span>
                                            <span class="text">reply</span>
                                        </span>
                                    </a>
                                </div>
                                <div class="empty-space col-xs-b35"></div>
                            </div>
                        </div>
                        <div class="comment-entry">
                            <div class="comment-top">
                                <img class="image" src="img/thumbnail-84.jpg" alt="" />
                                <div class="content">
                                    <h6 class="h6 col-xs-b5">samantha rae</h6>
                                    <div class="simple-article size-1 grey uppercase">20:45 apr 07 / 15</div>
                                </div>
                                <div class="simple-article size-2">Sed sodales sed orci molestie tristique. Nunc dictum, erat id molestie vestibulum, ex leo vestibulum justo, luctus tempor erat sem quis diam. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean efficitur vulputate elit.</div>
                                <a class="button size-1 style-5" href="#">
                                    <span class="button-wrapper">
                                        <span class="icon"><i class="fa fa-comment-o" aria-hidden="true"></i></span>
                                        <span class="text">reply</span>
                                    </span>
                                </a>
                            </div>
                            <div class="empty-space col-xs-b35"></div>
                        </div>
                    </div>
                    <div class="empty-space col-xs-b15"></div>
                    <div class="row m10">
                        <div class="col-sm-6">
                            <input class="simple-input" placeholder="First Name" />
                            <div class="empty-space col-xs-b20"></div>
                        </div>
                        <div class="col-sm-6">
                            <input class="simple-input" placeholder="Second Name" />
                            <div class="empty-space col-xs-b20"></div>
                        </div>
                        <div class="col-sm-12">
                            <textarea class="simple-input" placeholder="Your Message"></textarea>
                            <div class="empty-space col-xs-b20"></div>
                        </div>
                        <div class="col-sm-12 text-right">
                            <div class="button size-2 style-3">
                                <span class="button-wrapper">
                                    <span class="icon"><img src="img/icon-4.png" alt=""></span>
                                    <span class="text">submit</span>
                                </span>
                                <input type="submit"/>
                            </div>
                        </div>
                    </div>
                    
                    <div class="empty-space col-xs-b35 col-md-b70"></div>

                </div>
                <div class="col-md-3">
                    <div class="single-line-form">
                        <input class="simple-input small" type="text" value="" placeholder="Enter keyword">
                        <div class="submit-icon">
                            <i class="fa fa-search" aria-hidden="true"></i>
                            <input type="submit"/>
                        </div>
                    </div>
                    <div class="empty-space col-xs-b25 col-sm-b50"></div>

                    <div class="h4 col-xs-b10">categories</div>
                    <ul class="categories-menu alignleft">
                        <li>
                            <a href="#">laptops &amp; computers</a>
                            <div class="toggle"></div>
                            <ul>
                                <li>
                                    <a href="#">laptops &amp; computers</a>
                                    <div class="toggle"></div>
                                    <ul>
                                        <li>
                                            <a href="#">laptops &amp; computers</a>
                                        </li>
                                        <li>
                                            <a href="#">video &amp; photo cameras</a>
                                        </li>
                                        <li>
                                            <a href="#">smartphones</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">video &amp; photo cameras</a>
                                    <div class="toggle"></div>
                                    <ul>
                                        <li>
                                            <a href="#">video &amp; photo cameras</a>
                                        </li>
                                        <li>
                                            <a href="#">smartphones</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">smartphones</a>
                                </li>
                                <li>
                                    <a href="#">tv &amp; audio</a>
                                </li>
                                <li>
                                    <a href="#">gadgets</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">video &amp; photo cameras</a>
                            <div class="toggle"></div>
                            <ul>
                                <li>
                                    <a href="#">laptops &amp; computers</a>
                                    <div class="toggle"></div>
                                    <ul>
                                        <li>
                                            <a href="#">laptops &amp; computers</a>
                                        </li>
                                        <li>
                                            <a href="#">video &amp; photo cameras</a>
                                        </li>
                                        <li>
                                            <a href="#">smartphones</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">video &amp; photo cameras</a>
                                    <div class="toggle"></div>
                                    <ul>
                                        <li>
                                            <a href="#">laptops &amp; computers</a>
                                        </li>
                                        <li>
                                            <a href="#">smartphones</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">smartphones</a>
                                </li>
                                <li>
                                    <a href="#">tv &amp; audio</a>
                                </li>
                                <li>
                                    <a href="#">gadgets</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">smartphones</a>
                            <div class="toggle"></div>
                            <ul>
                                <li>
                                    <a href="#">laptops &amp; computers</a>
                                    <div class="toggle"></div>
                                    <ul>
                                        <li>
                                            <a href="#">laptops &amp; computers</a>
                                        </li>
                                        <li>
                                            <a href="#">video &amp; photo cameras</a>
                                        </li>
                                        <li>
                                            <a href="#">smartphones</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">video &amp; photo cameras</a>
                                    <div class="toggle"></div>
                                    <ul>
                                        <li>
                                            <a href="#">video &amp; photo cameras</a>
                                        </li>
                                        <li>
                                            <a href="#">smartphones</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">smartphones</a>
                                </li>
                                <li>
                                    <a href="#">tv &amp; audio</a>
                                </li>
                                <li>
                                    <a href="#">gadgets</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">tv &amp; audio</a>
                            <div class="toggle"></div>
                            <ul>
                                <li>
                                    <a href="#">laptops &amp; computers</a>
                                    <div class="toggle"></div>
                                    <ul>
                                        <li>
                                            <a href="#">laptops &amp; computers</a>
                                        </li>
                                        <li>
                                            <a href="#">video &amp; photo cameras</a>
                                        </li>
                                        <li>
                                            <a href="#">smartphones</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">video &amp; photo cameras</a>
                                    <div class="toggle"></div>
                                    <ul>
                                        <li>
                                            <a href="#">video &amp; photo cameras</a>
                                        </li>
                                        <li>
                                            <a href="#">smartphones</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">smartphones</a>
                                </li>
                                <li>
                                    <a href="#">tv &amp; audio</a>
                                </li>
                                <li>
                                    <a href="#">gadgets</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">gadgets</a>
                            <div class="toggle"></div>
                            <ul>
                                <li>
                                    <a href="#">laptops &amp; computers</a>
                                    <div class="toggle"></div>
                                    <ul>
                                        <li>
                                            <a href="#">laptops &amp; computers</a>
                                        </li>
                                        <li>
                                            <a href="#">video &amp; photo cameras</a>
                                        </li>
                                        <li>
                                            <a href="#">smartphones</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">video &amp; photo cameras</a>
                                    <div class="toggle"></div>
                                    <ul>
                                        <li>
                                            <a href="#">video &amp; photo cameras</a>
                                        </li>
                                        <li>
                                            <a href="#">smartphones</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">smartphones</a>
                                </li>
                                <li>
                                    <a href="#">tv &amp; audio</a>
                                </li>
                                <li>
                                    <a href="#">gadgets</a>
                                </li>
                            </ul>
                        </li>
                    </ul>

                    <div class="empty-space col-xs-b25 col-sm-b50"></div>

                    <div class="h4 col-xs-b25">Popular Tags</div>
                    <div class="blog-shortcode style-2">
                        <a href="#" class="preview rounded-image simple-mouseover"><img class="rounded-image" src="img/thumbnail-73.jpg" alt="" /></a>
                        <div class="title h6"><a href="#">Phasellus rhoncus in nunc sit</a></div>
                        <div class="description simple-article size-1 grey uppercase">apr 07 / 15 &nbsp;&nbsp;<a class="color" href="#">john wick</a> &nbsp;&nbsp;<a class="color" href="#">Gadgets</a></div>
                    </div>
                    <div class="empty-space col-xs-b25"></div>
                    <div class="blog-shortcode style-2">
                        <a href="#" class="preview rounded-image simple-mouseover"><img class="rounded-image" src="img/thumbnail-74.jpg" alt="" /></a>
                        <div class="title h6"><a href="#">Fusce viverra id diam nec</a></div>
                        <div class="description simple-article size-1 grey uppercase">apr 07 / 15 &nbsp;&nbsp;<a class="color" href="#">john wick</a> &nbsp;&nbsp;<a class="color" href="#">Gadgets</a></div>
                    </div>

                    <div class="empty-space col-xs-b25 col-sm-b50"></div>

                    <div class="h4 col-xs-b25">Popular Tags</div>
                    <div class="tags light clearfix">
                        <a class="tag">headphoness</a>
                        <a class="tag">accessories</a>
                        <a class="tag">new</a>
                        <a class="tag">wireless</a>
                        <a class="tag">cables</a>
                        <a class="tag">devices</a>
                        <a class="tag">gadgets</a>
                        <a class="tag">brands</a>
                        <a class="tag">replacements</a>
                        <a class="tag">cases</a>
                        <a class="tag">cables</a>
                        <a class="tag">professional</a>
                    </div>

                    <div class="empty-space col-xs-b25 col-sm-b50"></div>

                    <div class="h4 col-xs-b25">youtube chanel</div>

                    <div class="swiper-container" data-breakpoints="1" data-xs-slides="1" data-sm-slides="2" data-md-slides="1" data-lt-slides="1"  data-slides-per-view="1" data-space="30">
                        <div class="swiper-button-prev hidden"></div>
                        <div class="swiper-button-next hidden"></div>
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="blog-shortcode style-2">
                                    <a class="preview rounded-image">
                                        <img class="rounded-image" src="img/thumbnail-75.jpg" alt="" />
                                        <span class="play-button open-video" data-src="https://www.youtube.com/embed/kQT2y3UiosQ?autoplay=1&amp;loop=1&amp;modestbranding=1&amp;rel=0&amp;showinfo=0&amp;color=white&amp;theme=light&amp;wmode=transparent"></span>
                                    </a>
                                    <div class="title h6"><a href="#">Phasellus rhoncus in nunc sit</a></div>
                                    <div class="description simple-article size-1 grey">Duis fringilla felis et faucibus semper. Aliquam gravida elit et lectus viverra porta.</div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="blog-shortcode style-2">
                                    <a class="preview rounded-image">
                                        <img class="rounded-image" src="img/thumbnail-76.jpg" alt="" />
                                        <span class="play-button open-video" data-src="https://www.youtube.com/embed/kQT2y3UiosQ?autoplay=1&amp;loop=1&amp;modestbranding=1&amp;rel=0&amp;showinfo=0&amp;color=white&amp;theme=light&amp;wmode=transparent"></span>
                                    </a>
                                    <div class="title h6"><a href="#">Phasellus rhoncus in nunc sit</a></div>
                                    <div class="description simple-article size-1 grey">Duis fringilla felis et faucibus semper. Aliquam gravida elit et lectus viverra porta.</div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-pagination relative-pagination-small"></div>
                    </div>


                    <div class="empty-space col-xs-b25 col-sm-b50"></div>

                </div>
            </div>
        </div>

        <div class="empty-space col-xs-b35 col-md-b70"></div>

    <!-- masonry -->
    <script src="js/isotope.pkgd.min.js"></script>
    <script>
        $(window).load(function(){
            var $container = $('.grid').isotope({
                itemSelector: '.grid-item',
                masonry: {
                    columnWidth: '.grid-sizer'
                }
            });
        });
    </script>
@stop
