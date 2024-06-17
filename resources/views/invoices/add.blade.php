@extends('layouts.master')
@section('title', 'أضافة فاتورة')
@section('css')
    <!-- Internal Select2 css -->
    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
    <!--Internal  Datetimepicker-slider css -->
    <link href="{{ URL::asset('assets/plugins/amazeui-datetimepicker/css/amazeui.datetimepicker.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/jquery-simple-datetimepicker/jquery.simple-dtpicker.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/pickerjs/picker.min.css') }}" rel="stylesheet">
    <!-- Internal Spectrum-colorpicker css -->
    <link href="{{ URL::asset('assets/plugins/spectrum-colorpicker/spectrum.css') }}" rel="stylesheet">
    <!---Internal Fileupload css-->
    <link href="{{ URL::asset('assets/plugins/fileuploads/css/fileupload.css') }}" rel="stylesheet" type="text/css" />
    <!---Internal Fancy uploader css-->
    <link href="{{ URL::asset('assets/plugins/fancyuploder/fancy_fileupload.css') }}" rel="stylesheet" />
    <!--Internal Sumoselect css-->
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/sumoselect/sumoselect-rtl.css') }}">
    <!--Internal  TelephoneInput css-->
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/telephoneinput/telephoneinput-rtl.css') }}">
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">الفواتير</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ أضافة
                    فاتورة</span>
            </div>
        </div>

    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">



        <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
            <div class="card  box-shadow-0 ">
                <div class="card-header">
                    <h4 class="card-title mb-1">أضف فاتورة</h4>
                </div>
                <div class="card-body pt-0">
                    <form action="{{ route('Invoices.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="form-group col-4">
                                <label for="exampleInputText">رقم الفاتورة</label>
                                <input type="text" name="invoice_number" class="form-control" id="exampleInputText">
                            </div>
                            <div class="form-group col-4">
                                <label for="datepickerNoOfMonths">تاريخ الفاتورة</label>
                                <input class="form-control" name="invoice_date" placeholder="MM/DD/YYYY" type="date">
                            </div>

                            <div class="form-group col-4">
                                <label for="datepickerNoOfMonths">تاريخ الأستحقاق</label>
                                <input class="form-control" name="due_date" placeholder="MM/DD/YYYY" type="date">
                            </div>
                            <div class="form-group col-4">
                                <label for="exampleInputSection">القسم</label>
                                <select id="exampleInputSection" name="section" class="form-control select2-no-search"
                                    onclick="console.log($(this).val())" onchange="console.log('change is firing')">
                                    <option label="Choose one" selected disabled>-- حدد القسم --</option>
                                    @foreach ($sections as $section)
                                        <option value="{{ $section->id }}">{{ $section->section_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-4">
                                <label for="exampleInputProduct">المنتج</label>
                                <select id="product" name="product" class="form-control"></select>
                            </div>
                            <div class="form-group col-4">
                                <label for="exampleInputTahsel">مبلغ التحصيل</label>
                                <input type="text" name="invoice_number" class="form-control" id="exampleInputTahsel">
                            </div>
                            <div class="form-group col-4">
                                <label for="exampleInputOmola">مبلغ العمولة</label>
                                <input type="text" name="invoice_number" class="form-control" id="exampleInputOmola">

                            </div>
                            <div class="form-group col-4">
                                <label for="exampleInputDisc">الخصم</label>
                                <input type="text" name="discount" class="form-control" id="exampleInputDisc">
                            </div>
                            <div class="form-group col-4">
                                <label for="exampleInputTaxVal">نسبة ضريبة القيمه المضافة</label>
                                <select id="exampleInputTaxVal" name="value_status" class="form-control select2-no-search">
                                    <option label="Choose one">
                                    </option>
                                    <option value="Firefox">
                                        Firefox
                                    </option>
                                    <option value="Chrome">
                                        Chrome
                                    </option>
                                </select>
                            </div>
                            <div class="form-group col-6">
                                <label for="exampleInputTaxAdd">قيمة ضريبة القيمه المضافة</label>
                                <input type="text" name="value_vate" class="form-control" id="exampleInputTaxAdd"
                                    readonly>
                            </div>
                            <div class="form-group col-6">
                                <label for="exampleInputTotaltax">الأجمالى شامل الضريبه</label>
                                <input type="text" name="total" class="form-control" id="exampleInputTotaltax"
                                    readonly>
                            </div>

                            <div class="form-group col-12">
                                <label for="exampleInputTotaltax">ملاحظات</label>
                                <textarea class="form-control" name="note" placeholder="Textarea" rows="3"></textarea>
                            </div>
                            <div class="form-group col-12">
                                <label for="exampleInputTotaltax">المرفقات</label>
                                <input id="demo" type="file" name="files"
                                    accept=".jpg, .png, image/jpeg, image/png, html, zip, css,js" multiple>
                            </div>



                        </div>
                        <button class="btn ripple btn-primary" type="submit">تأكيد البيانات</button>
                        <button class="btn ripple btn-secondary" data-dismiss="modal" type="button">إغلاق</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- row -->
    </div>
    <!-- row closed -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
    <!--Internal  Datepicker js -->
    <script src="{{ URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js') }}"></script>
    <!--Internal  jquery.maskedinput js -->
    <script src="{{ URL::asset('assets/plugins/jquery.maskedinput/jquery.maskedinput.js') }}"></script>
    <!--Internal  spectrum-colorpicker js -->
    <script src="{{ URL::asset('assets/plugins/spectrum-colorpicker/spectrum.js') }}"></script>
    <!-- Internal Select2.min js -->
    <script src="{{ URL::asset('assets/plugins/select2/js/select2.min.js') }}"></script>
    <!--Internal Ion.rangeSlider.min js -->
    <script src="{{ URL::asset('assets/plugins/ion-rangeslider/js/ion.rangeSlider.min.js') }}"></script>
    <!--Internal  jquery-simple-datetimepicker js -->
    <script src="{{ URL::asset('assets/plugins/amazeui-datetimepicker/js/amazeui.datetimepicker.min.js') }}"></script>
    <!-- Ionicons js -->
    <script src="{{ URL::asset('assets/plugins/jquery-simple-datetimepicker/jquery.simple-dtpicker.js') }}"></script>
    <!--Internal  pickerjs js -->
    <script src="{{ URL::asset('assets/plugins/pickerjs/picker.min.js') }}"></script>
    <!-- Internal form-elements js -->
    <script src="{{ URL::asset('assets/js/form-elements.js') }}"></script>

    <!--Internal Fileuploads js-->
    <script src="{{ URL::asset('assets/plugins/fileuploads/js/fileupload.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fileuploads/js/file-upload.js') }}"></script>
    <!--Internal Fancy uploader js-->
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.ui.widget.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.fileupload.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.iframe-transport.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.fancy-fileupload.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/fancy-uploader.js') }}"></script>
    <!--Internal  Form-elements js-->
    <script src="{{ URL::asset('assets/js/advanced-form-elements.js') }}"></script>
    <!--Internal Sumoselect js-->
    <script src="{{ URL::asset('assets/plugins/sumoselect/jquery.sumoselect.js') }}"></script>
    <!-- Internal TelephoneInput js-->
    <script src="{{ URL::asset('assets/plugins/telephoneinput/telephoneinput.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/telephoneinput/inttelephoneinput.js') }}"></script>





    <script>
        $(document).ready(function() {
            // Event listener for changes on the section dropdown
            $('select[name="section"]').on('change', function() {
                var SectionId = $(this).val(); // Get the selected section ID

                if (SectionId) {
                    // AJAX request to get products based on section ID
                    $.ajax({
                        url: `{{ URL::to('sections') }}/${SectionId}`,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            var productSelect = $('select[name="product"]');
                            productSelect.empty(); // Clear the product dropdown

                            // Append new options to the product dropdown
                            $.each(data, function(key, value) {
                                productSelect.append(
                                    `<option value="${value}">${value}</option>`);
                            });
                        },
                        error: function(xhr, status, error) {
                            console.error('AJAX request failed:', status, error);
                        }
                    });
                } else {
                    console.log('No section selected or invalid section ID');
                }
            });
        });
    </script>



@endsection
