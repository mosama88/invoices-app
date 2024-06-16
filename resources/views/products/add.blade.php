  <!-- Basic modal -->
  <div class="modal" id="modaldemo8">
      <div class="modal-dialog" role="document">
          <div class="modal-content modal-content-demo">
              <div class="modal-header">
                  <h6 class="modal-title">أضافة المنتج</h6><button aria-label="Close" class="close" data-dismiss="modal"
                      type="button"><span aria-hidden="true">&times;</span></button>
              </div>
              <div class="modal-body">
                  <form action="{{ route('products.store') }}" method="POST">
                      @csrf
                      <div class="">
                          <div class="form-group">
                              <label for="exampleInputSection">أسم المنتج</label>
                              <input type="text" name="product_name" class="form-control" id="exampleInputSection"
                                  placeholder="أسم القسم">
                              @error('product_name')
                                  <div class="alert alert-danger">{{ $message }}</div>
                              @enderror
                          </div>

                          <div class="form-group">
                              <p class="mg-b-10">القسم</p>
                              <select name="section_name" class="form-control SlectBox"
                                  onclick="console.log($(this).val())" onchange="console.log('change is firing')">
                                  <!--placeholder-->
                                  <option selected disabled>-- أختر القسم --</option>
                                  @foreach ($sections as $section)
                                      <div class="form-group">
                                          <option value="{{ $section->id }}">{{ $section->section_name }}</option>
                                  @endforeach
                              </select>
                              @error('section_name')
                                  <div class="alert alert-danger">{{ $message }}</div>
                              @enderror
                          </div>


                          <div class="form-group">
                              <label for="exampleInputDesc">الوصف</label>
                              <textarea id="exampleInputDesc" class="form-control" name="description" placeholder="Textarea" rows="3"></textarea>
                              @error('description')
                                  <div class="alert alert-danger">{{ $message }}</div>
                              @enderror
                          </div>
                      </div>

                      <div class="modal-footer">
                          <button class="btn ripple btn-primary" type="submit">تأكيد البيانات</button>
                          <button class="btn ripple btn-secondary" data-dismiss="modal" type="button">إغلاق</button>
                      </div>
                  </form>
              </div>
          </div>
      </div>
  </div>
  <!-- End Basic modal -->
