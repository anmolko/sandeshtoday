@extends('frontend.layouts.master')
@section('title')  Page Not Found @endsection
@section('css')
<style>

    .center {
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
    }

    .error {
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        align-content: center;
    }

    .number {
        font-weight: 900;
        font-size: 15rem;
        line-height: 1;
        color :#27308c;
    }

    .illustration {
        position: relative;
        width: 12.2rem;
        margin: 0 2.1rem;
    }

    .circle {
        position: absolute;
        bottom: 0;
        left: 0;
        width: 12.2rem;
        height: 11.4rem;
        border-radius: 50%;
        background-color: #e94033;
    }

    .clip {
        position: absolute;
        bottom: 0.3rem;
        left: 50%;
        transform: translateX(-50%);
        overflow: hidden;
        width: 12.5rem;
        height: 13rem;
        border-radius: 0 0 50% 50%;
    }

    .paper {
        position: absolute;
        bottom: -0.3rem;
        left: 50%;
        transform: translateX(-50%);
        width: 9.2rem;
        height: 12.4rem;
        border: 0.3rem solid #e94033;
        background-color: white;
        border-radius: 0.8rem;
    }

    .paper::before {
        content: "";
        position: absolute;
        top: -0.7rem;
        right: -0.7rem;
        width: 1.4rem;
        height: 1rem;
        background-color: white;
        border-bottom: 0.3rem solid #27308c;
        transform: rotate(45deg);
    }

    .face {
        position: relative;
        margin-top: 2.3rem;
    }

    .eyes {
        position: absolute;
        top: 0;
        left: 2.4rem;
        width: 4.6rem;
        height: 0.8rem;
    }

    .eye {
        position: absolute;
        bottom: 0;
        width: 0.8rem;
        height: 0.8rem;
        border-radius: 50%;
        background-color: #293b49;
        animation-name: eye;
        animation-duration: 4s;
        animation-iteration-count: infinite;
        animation-timing-function: ease-in-out;
    }

    .eye-left {
        left: 0;
    }

    .eye-right {
        right: 0;
    }

    @keyframes eye {
        0% {
            height: 0.8rem;
        }
        50% {
            height: 0.8rem;
        }
        52% {
            height: 0.1rem;
        }
        54% {
            height: 0.8rem;
        }
        100% {
            height: 0.8rem;
        }
    }

    .rosyCheeks {
        position: absolute;
        top: 1.6rem;
        width: 1rem;
        height: 0.2rem;
        border-radius: 50%;
        background-color: #fdabaf;
    }

    .rosyCheeks-left {
        left: 1.4rem;
    }

    .rosyCheeks-right {
        right: 1.4rem;
    }

    .mouth {
        position: absolute;
        top: 3.1rem;
        left: 50%;
        width: 1.6rem;
        height: 0.2rem;
        border-radius: 0.1rem;
        transform: translateX(-50%);
        background-color: #293b49;
    }

    .message {
        margin-top: 1em;
        font-weight: 600;
        font-size: 60px;
        font-family: "Khand", sans-serif;
        color: #27308c;

    }
    .button {
        margin-top: 2em;
        background-color: #e94033;
        padding: 0.5em 3em;
        font-size: 24px;
        color: #fff;
    }

    .button:hover {
        background-color: #27308c;
        color: #fff;
    }
    .mb-80{
        margin-top: 80px;
        margin-bottom: 80px;
    }
</style>
@endsection
@section('content')
    <section class="block-wrapper mb-80">
        <div class="container">
            <div class="center">
                <div class="error">
                    <div class="number">4</div>
                    <div class="illustration">
                        <div class="circle"></div>
                        <div class="clip">
                            <div class="paper">
                                <div class="face">
                                    <div class="eyes">
                                        <div class="eye eye-left"></div>
                                        <div class="eye eye-right"></div>
                                    </div>
                                    <div class="rosyCheeks rosyCheeks-left"></div>
                                    <div class="rosyCheeks rosyCheeks-right"></div>
                                    <div class="mouth"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="number">4</div>
                </div>
                <p class="message">खोज सफल भएन । फिर्ता जुम ?</p>
                <a class="button" href="/">होम पेज</a>
            </div>

        </div>
    </section>


@endsection
