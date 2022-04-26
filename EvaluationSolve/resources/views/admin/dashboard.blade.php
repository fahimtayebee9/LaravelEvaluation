@extends('ftsadmin.layouts.app')

@section('body')
    <div class="br-pagebody">
        <div class="row row-sm">
            <div class="col-sm-6 col-xl-6">
                <div class="bg-info rounded overflow-hidden">
                    <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                        <i class="ion ion-earth tx-60 lh-0 tx-white op-7"></i>
                        <div class="mg-l-20">
                            <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">Total Categories
                            </p>
                            <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">{{ $categories->count() }}</p>
                        </div>
                    </div>
                    <div id="ch1" class="ht-50 tr-y-1 rickshaw_graph"><svg width="388" height="50">
                            <g>
                                <path
                                    d="M0,25Q28.02222222222222,19.291666666666664,32.33333333333333,19.374999999999996C38.79999999999999,19.499999999999996,58.19999999999999,25.0625,64.66666666666666,26.25S90.53333333333333,30.875,97,31.25S122.86666666666665,30.625,129.33333333333331,30S155.2,24.25,161.66666666666666,25S187.53333333333333,35.625,194,37.5S219.86666666666665,43.75,226.33333333333331,43.75S252.19999999999996,38.4375,258.66666666666663,37.5S284.53333333333336,35.3125,291,34.375S316.8666666666667,27.8125,323.3333333333333,28.125S349.2,37.8125,355.66666666666663,37.5Q359.97777777777776,37.291666666666664,388,25L388,50Q359.97777777777776,50,355.66666666666663,50C349.2,50,329.79999999999995,50,323.3333333333333,50S297.46666666666664,50,291,50S265.13333333333327,50,258.66666666666663,50S232.79999999999998,50,226.33333333333331,50S200.46666666666667,50,194,50S168.13333333333333,50,161.66666666666666,50S135.79999999999998,50,129.33333333333331,50S103.46666666666667,50,97,50S71.13333333333333,50,64.66666666666666,50S38.79999999999999,50,32.33333333333333,50Q28.02222222222222,50,0,50Z"
                                    class="area" fill="rgba(255,255,255,0.5)"></path>
                            </g>
                        </svg></div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-6 mg-t-20 mg-sm-t-0">
                <div class="bg-purple rounded overflow-hidden">
                    <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                        <i class="ion ion-bag tx-60 lh-0 tx-white op-7"></i>
                        <div class="mg-l-20">
                            <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">Total Products
                            </p>
                            <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">
                                {{$products->count()}}
                            </p>
                        </div>
                    </div>
                    <div id="ch3" class="ht-50 tr-y-1 rickshaw_graph"><svg width="388" height="50">
                            <g>
                                <path
                                    d="M0,25Q28.02222222222222,21.458333333333332,32.33333333333333,21.875C38.79999999999999,22.5,58.19999999999999,30.9375,64.66666666666666,31.25S90.53333333333333,26.25,97,25S122.86666666666665,18.75,129.33333333333331,18.75S155.2,23.125,161.66666666666666,25S187.53333333333333,35.625,194,37.5S219.86666666666665,43.75,226.33333333333331,43.75S252.19999999999996,38.4375,258.66666666666663,37.5S284.53333333333336,35.3125,291,34.375S316.8666666666667,27.8125,323.3333333333333,28.125S349.2,37.8125,355.66666666666663,37.5Q359.97777777777776,37.291666666666664,388,25L388,50Q359.97777777777776,50,355.66666666666663,50C349.2,50,329.79999999999995,50,323.3333333333333,50S297.46666666666664,50,291,50S265.13333333333327,50,258.66666666666663,50S232.79999999999998,50,226.33333333333331,50S200.46666666666667,50,194,50S168.13333333333333,50,161.66666666666666,50S135.79999999999998,50,129.33333333333331,50S103.46666666666667,50,97,50S71.13333333333333,50,64.66666666666666,50S38.79999999999999,50,32.33333333333333,50Q28.02222222222222,50,0,50Z"
                                    class="area" fill="rgba(255,255,255,0.5)"></path>
                            </g>
                        </svg></div>
                </div>
            </div>
        </div><!-- row -->

        <div class="row row-sm mg-t-20">
            <div class="col-lg-12">
                <div class="card bd-0 shadow-base">
                    <div class="d-md-flex justify-content-between pd-25">
                        <div>
                            <h6 class="tx-13 tx-uppercase tx-inverse tx-semibold tx-spacing-1">Products In Stock</h6>
                        </div>
                        <div class="d-sm-flex">
                            <div>
                                <p class="mg-b-5 tx-uppercase tx-10 tx-mont tx-semibold">Bounce Rate</p>
                                <h4 class="tx-lato tx-inverse tx-bold mg-b-0">23.32%</h4>
                                <span class="tx-12 tx-success tx-roboto">2.7% increased</span>
                            </div>
                            <div class="bd-sm-l pd-sm-l-20 mg-sm-l-20 mg-t-20 mg-sm-t-0">
                                <p class="mg-b-5 tx-uppercase tx-10 tx-mont tx-semibold">Page Views</p>
                                <h4 class="tx-lato tx-inverse tx-bold mg-b-0">38.20%</h4>
                                <span class="tx-12 tx-danger tx-roboto">4.65% decreased</span>
                            </div>
                            <div class="bd-sm-l pd-sm-l-20 mg-sm-l-20 mg-t-20 mg-sm-t-0">
                                <p class="mg-b-5 tx-uppercase tx-10 tx-mont tx-semibold">Time On Site</p>
                                <h4 class="tx-lato tx-inverse tx-bold mg-b-0">12:30</h4>
                                <span class="tx-12 tx-success tx-roboto">1.22% increased</span>
                            </div>
                        </div><!-- d-flex -->
                    </div><!-- d-flex -->

                    <div class="pd-l-25 pd-r-15 pd-b-25">
                        <div id="ch5" class="ht-250 ht-sm-300" style="padding: 0px; position: relative;"><canvas
                                class="flot-base" width="1028" height="300"
                                style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 1028.66px; height: 300px;"></canvas>
                            <div class="flot-text"
                                style="position: absolute; inset: 0px; font-size: smaller; color: rgb(84, 84, 84);">
                                <div class="flot-x-axis flot-x1-axis xAxis x1Axis" style="position: absolute; inset: 0px;">
                                    <div
                                        style="position: absolute; max-width: 93px; top: 288px; font: 400 10px / 12px &quot;Fira Sans&quot;, &quot;Helvetica Neue&quot;, Arial, sans-serif; color: rgb(153, 153, 153); left: 20px; text-align: center;">
                                        0</div>
                                    <div
                                        style="position: absolute; max-width: 93px; top: 288px; font: 400 10px / 12px &quot;Fira Sans&quot;, &quot;Helvetica Neue&quot;, Arial, sans-serif; color: rgb(153, 153, 153); left: 126px; text-align: center;">
                                        2</div>
                                    <div
                                        style="position: absolute; max-width: 93px; top: 288px; font: 400 10px / 12px &quot;Fira Sans&quot;, &quot;Helvetica Neue&quot;, Arial, sans-serif; color: rgb(153, 153, 153); left: 230px; text-align: center;">
                                        4</div>
                                    <div
                                        style="position: absolute; max-width: 93px; top: 288px; font: 400 10px / 12px &quot;Fira Sans&quot;, &quot;Helvetica Neue&quot;, Arial, sans-serif; color: rgb(153, 153, 153); left: 335px; text-align: center;">
                                        6</div>
                                    <div
                                        style="position: absolute; max-width: 93px; top: 288px; font: 400 10px / 12px &quot;Fira Sans&quot;, &quot;Helvetica Neue&quot;, Arial, sans-serif; color: rgb(153, 153, 153); left: 440px; text-align: center;">
                                        8</div>
                                    <div
                                        style="position: absolute; max-width: 93px; top: 288px; font: 400 10px / 12px &quot;Fira Sans&quot;, &quot;Helvetica Neue&quot;, Arial, sans-serif; color: rgb(153, 153, 153); left: 543px; text-align: center;">
                                        10</div>
                                    <div
                                        style="position: absolute; max-width: 93px; top: 288px; font: 400 10px / 12px &quot;Fira Sans&quot;, &quot;Helvetica Neue&quot;, Arial, sans-serif; color: rgb(153, 153, 153); left: 648px; text-align: center;">
                                        12</div>
                                    <div
                                        style="position: absolute; max-width: 93px; top: 288px; font: 400 10px / 12px &quot;Fira Sans&quot;, &quot;Helvetica Neue&quot;, Arial, sans-serif; color: rgb(153, 153, 153); left: 753px; text-align: center;">
                                        14</div>
                                    <div
                                        style="position: absolute; max-width: 93px; top: 288px; font: 400 10px / 12px &quot;Fira Sans&quot;, &quot;Helvetica Neue&quot;, Arial, sans-serif; color: rgb(153, 153, 153); left: 858px; text-align: center;">
                                        16</div>
                                    <div
                                        style="position: absolute; max-width: 93px; top: 288px; font: 400 10px / 12px &quot;Fira Sans&quot;, &quot;Helvetica Neue&quot;, Arial, sans-serif; color: rgb(153, 153, 153); left: 963px; text-align: center;">
                                        18</div>
                                </div>
                                <div class="flot-y-axis flot-y1-axis yAxis y1Axis" style="position: absolute; inset: 0px;">
                                    <div
                                        style="position: absolute; top: 277px; font: 400 10px / 12px &quot;Fira Sans&quot;, &quot;Helvetica Neue&quot;, Arial, sans-serif; color: rgb(153, 153, 153); left: 4px; text-align: right;">
                                        0.0</div>
                                    <div
                                        style="position: absolute; top: 231px; font: 400 10px / 12px &quot;Fira Sans&quot;, &quot;Helvetica Neue&quot;, Arial, sans-serif; color: rgb(153, 153, 153); left: 5px; text-align: right;">
                                        2.5</div>
                                    <div
                                        style="position: absolute; top: 185px; font: 400 10px / 12px &quot;Fira Sans&quot;, &quot;Helvetica Neue&quot;, Arial, sans-serif; color: rgb(153, 153, 153); left: 5px; text-align: right;">
                                        5.0</div>
                                    <div
                                        style="position: absolute; top: 140px; font: 400 10px / 12px &quot;Fira Sans&quot;, &quot;Helvetica Neue&quot;, Arial, sans-serif; color: rgb(153, 153, 153); left: 6px; text-align: right;">
                                        7.5</div>
                                    <div
                                        style="position: absolute; top: 94px; font: 400 10px / 12px &quot;Fira Sans&quot;, &quot;Helvetica Neue&quot;, Arial, sans-serif; color: rgb(153, 153, 153); left: 0px; text-align: right;">
                                        10.0</div>
                                    <div
                                        style="position: absolute; top: 48px; font: 400 10px / 12px &quot;Fira Sans&quot;, &quot;Helvetica Neue&quot;, Arial, sans-serif; color: rgb(153, 153, 153); left: 1px; text-align: right;">
                                        12.5</div>
                                    <div
                                        style="position: absolute; top: 2px; font: 400 10px / 12px &quot;Fira Sans&quot;, &quot;Helvetica Neue&quot;, Arial, sans-serif; color: rgb(153, 153, 153); left: 1px; text-align: right;">
                                        15.0</div>
                                </div>
                            </div><canvas class="flot-overlay" width="1028" height="300"
                                style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 1028.66px; height: 300px;"></canvas>
                            <div class="legend">
                                <div
                                    style="position: absolute; width: 80.25px; height: 37px; top: 13px; right: 13px; background-color: rgb(255, 255, 255); opacity: 0.85;">
                                </div>
                                <table style="position:absolute;top:13px;right:13px;;font-size:smaller;color:#545454">
                                    <tbody>
                                        <tr>
                                            <td class="legendColorBox">
                                                <div style="border:1px solid #ccc;padding:1px">
                                                    <div
                                                        style="width:4px;height:0;border:5px solid #17A2B8;overflow:hidden">
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="legendLabel">Bounce Rate</td>
                                        </tr>
                                        <tr>
                                            <td class="legendColorBox">
                                                <div style="border:1px solid #ccc;padding:1px">
                                                    <div
                                                        style="width:4px;height:0;border:5px solid #4E6577;overflow:hidden">
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="legendLabel">Page Views</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div><!-- card -->
            </div>
        </div><!-- row -->
    </div>
@endsection
