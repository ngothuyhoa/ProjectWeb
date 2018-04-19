
<form action="" method="POST">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
<div class="col-lg-9" style="padding-bottom:120px ;margin-left: 100px">
                        
                            <div class="form-group">
                                
                                <label>Mã sinh viên :</label>
                                <input class="form-control" name="msv" placeholder="Please Enter Username" />
                            </div>
                               <div class="form-group">
                                <label>Tên sinh viên :</label>
                                <input class="form-control" name="ten" placeholder="Please Enter Username" />
                            </div>
                            <div class="form-group">
                                <label>Ngày Sinh :</label>
                                <input class="form-control" type="date" id="datepicker" name="ngaysinh" />
                            </div>
                            <div class="form-group">
                                <label>Gioi Tinh :</label>
                                <form >
                                <input type="radio" name="gioitinh" value="Nam"> Nam
                                <input type="radio" name="gioitinh" value="Nữ"> Nữ
                                <input type="radio" name="gioitinh" value="Khác"> Khác
                                </form>
                            </div>
                            <div class="form-group">
                                <label>Địa chỉ :</label>
                                <input class="form-control" name="diachi" placeholder="Please Enter Username" />
                            </div>
                            <div class="form-group">
                                <label>Email :</label>
                                <input class="form-control" name="email" placeholder="Please Enter Username" />
                            </div>
                            <div class="form-group">
                                <label>SDT :</label>
                                <input class="form-control" name="sdt" placeholder="Please Enter Username" />
                            </div>
                            <div class="form-group">
                                <label>Lop :</label>
                                <input class="form-control" name="lop" placeholder="Please Enter Username" />
                            </div>
                            <div class="form-group">
                                <label>Khóa :</label>
                                <input class="form-control" name="khoa" placeholder="Please Enter Username" />
                            </div>
                           
                            <div class="form-group">
                                <label>Bộ môn</label>
                                
                                <select id="" class="form-control" name="bomon">  
                                    @foreach($bomon as $bm)
                                 <option>{{$bm->ten_bo_mon}}</option>
                                 @endforeach
                             </select>
                            </div>
                            <div class="form-group">
                                <label>Ghi Chu :</label>
                                <input class="form-control" name="ghichu" placeholder="Please Enter Username" />
                            </div>
                            <button type="submit" class="btn btn-default" value="submit">Them </button>

                    </div>
                 </form>