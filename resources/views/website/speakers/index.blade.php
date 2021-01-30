@extends('website.layouts.app')

@section('title')
    Speakers - Up Skill Educator
@endsection

 
@section('content')
<div class="clear"></div>
<style>
        
        .abtcomp p{
            font: 16px/27px "OpenSans",sans-serif;
        }
         .abtcomp li{
            font: 16px/27px "OpenSans",sans-serif;
        }
        .owl-carousel .owl-item img{
            display: initial;
        }
        .item img {
            max-width: 255px;
            max-height: 255px;
        }


        *html .item img {
            width: expression((this.width/this.height)>=1?255:'auto');
            height: expression((this.width/this.height)<1?255:'auto');
        }
        .profile-img {
            width: 25px;
            border: 1px solid #f26a21;
            border-radius: 100%;
        }
        .no-js #loader { display: none;  }
.js #loader { display: block; position: absolute; left: 100px; top: 0; }
.se-pre-con {
    position: fixed;
    left: 0px;
    top: 0px;
    width: 100%;
    height: 100%;
    z-index: 9999;
    background: url(/images/loader.gif) center no-repeat #fff;
    background-size: 200px auto;
}
.box-bg:hover {
    background: linear-gradient(to right, #ff2670 0%, #ff6c36 100%) !important;
    box-shadow: 0px 7px 18px #d6d6d6;
    transition: 0.5s all linear;
}
p.speakerp:hover {
    color: white;
}
.empPrograms {
        margin: 0 auto;
        font-family: roboto-normal;
    }
    .coulis span {
        margin: 0 5px 0 0;
        font-size: 14px;
        color: #448bab;
    }
    .browsebox:hover{
        background-color:#e4eaea;
    }
    .listlist:hover{
         background-color:#e4eaea;
    }
    
    .speaker-image {
        float: left;
        margin: 10px;
        overflow: hidden;
        box-shadow: 0 0 0 3px #a3a5a7;
        border-radius: 50%;
    }
     .speaker-box .box-bg{         
        min-height:337px;
     }
    .speaker-box{
        padding: 5px 5px;
        width: 25%;
    }

    .speakerp {
        padding: 2px 12px;
        color: #656363;
        text-align: justify;
    }

        .speakerp span {
            font-size: 12px;
            color: #2a7cc1;
        }

    .speaker-name {
        margin-bottom: 0.3rem !important;
        padding-top: 10%;
        font-weight: 700;
        color: #212529;
        font-size: 17px;
    }

    .speaker-image img {
        border-radius: 50%;
        object-fit: cover;
        object-position: center;
        max-width: 100px !important;
        max-height: 100px !important;
    }

    *html .speaker-image img {
        width: expression((this.width/this.height)>=1?100:'auto') !important;
        height: expression((this.width/this.height)<1?100:'auto') !important;
    }
    .courselist {
    padding: 0px 0 0 0 !important;
}

@media screen and (min-device-width: 350px) and (max-device-width: 768px) {
   .speaker-box {
    padding: 5px 5px;
    width: 49% !important;
}
}

@media screen and (min-device-width: 350px) and (max-device-width: 449px) {
   .speaker-box {
    padding: 5px 5px;
    width: 99% !important;
}
}
    </style>
  
    <main id="main-content">
        <div class="innerbanner" style="background-image: url({{ url('assets/images/product-banner.jpg') }});">
            <div class="container">
                <h1>Speakers</h1>
                <div class="breadcrumbs">
                    <a href="{{ url('/') }}">Home</a>
                    <i class="fas fa-caret-right"></i>
                    <span>Speakers</span>
                </div>
            </div>
        </div>
        <div class="product-listing">
            <div class="container">
  
<!---Course Listing---->
<div class="courselist">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 style="text-align:center;padding-bottom: 40px;">Our Speakers </h2>
            </div>
            <div class="col-md-12 col-lg-12">
                <div class="recipe-set">
                    <div class="recipe-listing listing-grid" style="padding:20px 0 0 0;">
                                 @foreach($speakers as $speaker) 
                                <div class="wow fadeIn speaker-box" style="visibility: visible; animation-name: fadeIn;">
                                    <a href="{{url('/speaker-detail')}}/{{$speaker->title}}">
                                        <div class="box-bg">
                                            <div class="speaker-image">
                                                    <img onerror="return OnImageError(this);" src="{{ $speaker->image }}" alt="{{ $speaker->title }}" class="img-fluid">
                                            </div>
                                            <p class="speaker-name">{{ $speaker->title }} </p>
                                                <p class="speakerp">@php $desc = strip_tags($speaker->description) @endphp
                                                {{ substr($desc,0,300) }} ....
                                                <span>More info </span> </p>
                                        </div>
                                    </a>
                                </div>
                                @endforeach
                                 
                                

                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>
 
    </div>
    
  
    

 </div></div> 
            </div>
        </div>
    </main>

  
@endsection
