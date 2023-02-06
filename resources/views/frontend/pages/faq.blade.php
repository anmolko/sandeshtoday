
@extends('frontend.layouts.master')
@section('title') FAQ @endsection
@section('css')
    <style>
           
	.corpkit-content > .corpkit-content-inner {
		padding-top: 0;
		padding-bottom: 0;
	}
    </style>
@endsection
@section('content')


<div class="corpkit-content-wrapper">
	<div class="corpkit-content corpkit-page">
		<header id="page-title" class="page-title-wrap">
		<div class="page-title-wrap-inner" data-property="no-video">
			<span class="page-title-overlay"></span>
			<div class="container">
			<div class="row">
				<div class="col-md-12">
				<div class="page-title-inner">
					<div class="pull-left">
					<h1 class="page-title">Faq</h1>
					<div id="breadcrumb" class="breadcrumb">
						<a href="/">Home</a>
						<span class="current">Faq</span>
					</div>
					</div>
				</div>
				</div>
			</div>
			</div>
		</div>
		<!-- .page-title-wrap-inner -->
		</header>
		<div class="corpkit-content-inner">
		<div class="container">
			<div class="row">
			<div class="col-md-12">
				<div id="primary" class="content-area clearfix">
				<div
					id="page-10922"
					class="post-10922 page type-page status-publish hentry"
				>
					<div
					data-elementor-type="wp-page"
					data-elementor-id="10922"
					class="elementor elementor-10922"
					>
					<section
						data-cea-float='[{"float_title":"Floating Image","float_img":"{{asset("assets/frontend/wp-content/uploads/sites/45/2021/08/icon-5.png")}}","float_left":"0","float_top":"50","float_distance":"","float_animation":"2","float_mouse":"0","float_width":"50px"}]'
						class="elementor-section elementor-top-section elementor-element elementor-element-ba6a5da elementor-section-stretched elementor-section-content-middle elementor-section-boxed elementor-section-height-default elementor-section-height-default"
						data-id="ba6a5da"
						data-element_type="section"
						data-settings='{"stretch_section":"section-stretched","background_background":"classic"}'
					>
						<div class="elementor-background-overlay"></div>
						<div
						class="elementor-container elementor-column-gap-extended"
						>
						<div
							class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-986c6b4"
							data-id="986c6b4"
							data-element_type="column"
							data-settings='{"background_background":"classic"}'
						>
							<div
							class="elementor-widget-wrap elementor-element-populated"
							>
							<div class="elementor-background-overlay"></div>
							<div
								class="elementor-element elementor-element-bcdac93 cea-align-left elementor-widget elementor-widget-ceasectiontitle"
								data-id="bcdac93"
								data-element_type="widget"
								data-widget_type="ceasectiontitle.default"
							>
								<div class="elementor-widget-container">
								<div class="section-title-wrapper">
									<div class="title-wrap">
									<h6 class="sub-title">
									{{ucwords(@$accordian2_elements[0]->heading)}}
									</h6>
									<h2 class="section-title">
									{{ucwords(@$accordian2_elements[0]->subheading)}}

									</h2>
									</div>
									<!-- .title-wrap -->
									<div class="section-description">
									<p class="section-content win-justify">
									{{@$accordian2_elements[0]->description}}
									</p>
										@if(@$accordian2_elements[0]->button_link)
											<div class="cea-button-wrapper">
												<a
												href="{{@$accordian2_elements[0]->button_link}}"
												class="cea-button-link elementor-button cea-button elementor-size-sm"
												>
												<span
													class="cea-button-content-wrapper"
												>
													<span
													class="cea-button-icon cea-align-icon-"
													>
													</span>
													<span class="cea-button-text"
													>{{ucwords(@$accordian2_elements[0]->button)}}</span
													>
												</span>
												</a>
											</div>
										@endif
									</div>
									<!-- .section-description -->
								</div>
								<!-- .section-title-wrapper -->
								</div>
							</div>
							</div>
						</div>
						<div
							class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-0b4c1e1"
							data-id="0b4c1e1"
							data-element_type="column"
						>
							<div
							class="elementor-widget-wrap elementor-element-populated"
							>
							<div
								class="elementor-element elementor-element-5fac64a elementor-widget elementor-widget-ceaaccordion"
								data-id="5fac64a"
								data-element_type="widget"
								data-widget_type="ceaaccordion.default"
							>
								<div
								class="elementor-widget-container cea-accordion-elementor-widget"
								data-toggle=""
								>
								<div
									class="cea-accordions"
									id="cea-accordion-1">
									@for ($i = 1; $i <=$list_2; $i++)
									<div class="card cea-accordion">
										<div class="card-header cea-accordion-header" >
											<a
											class="nav-item nav-link @if($i == '1') active @endif"
											href="#cea-accordion-1-{{$i}}"
											><span
												class="elementor-accordion-icon elementor-accordion-icon-right"
												aria-hidden="true"
												><span
												class="cea-accordion-icon-closed"
												><i
													class="ti ti-arrow-circle-down"
												></i></span
												><span
												class="cea-accordion-icon-opened"
												><i
													class="ti ti-arrow-circle-up"
												></i></span></span
											>{{@$accordian2_elements[$i-1]->list_header}}</a
											>
										</div>
										<!-- .card-header -->
										<div class="cea-accordion-content @if($i == '1') active @endif"
											id="cea-accordion-1-{{$i}}" >
											<div class="card-body">
												<div class="cea-accordion-pane win-justify">
												{!! @$accordian2_elements[$i-1]->list_description !!}
												</div>
											</div>
										<!-- .card-body -->
										</div>
										<!-- .cea-accordion-content -->
									</div>
									@endfor
							
								</div>
								</div>
							</div>
							</div>
						</div>
						</div>
					</section>
					</div>
				</div>
				<!-- #post-## -->
				</div>
				<!-- #primary -->
			</div>
			<!-- main col -->
			</div>
			<!-- row -->
		</div>
		<!-- .container -->
		</div>
		<!-- .corpkit-content-inner -->
	</div>
<!-- .corpkit-content -->
</div>


		

@endsection