<?php $student = session('student'); ?>
<div class="modal fade" id="updateInforStudent" rolo="dialog" >
    <div class="modal-dialog " >
        <div class="modal-content " style="width: 800px; background-color:#b0dab9">
            <div class="modal-header">
                <h6 class="modal-title" style="text-align: auto-left"><b>Profile</b></h6>
            </div>
			<div class="modal-body">
                <form method = "POST" action="update_information_private_student" >
                	<input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="row">
                      	<table class="col-md-5" >
                        	<tr>
                          		<td style="padding: 10px">Giới tính   :</td>
						        <td>
						          	<select name="gender">
						                <option value="Nam">Nam</option>
						                <option value="Nữ">Nữ</option>
						            </select> 
						        </td> 
                        	</tr>
							<tr>
							    <td style="padding: 10px">Số điện thoại:</td>
							    <td>
							        <input style="text-align:center" type ="text" name="phone_number" value="{{$student->phone_number}}"/>
							    </td>
							</tr>
                        	<tr>
                          		<td style="padding: 10px">Lớp:</td>
                          		<td>
                            		<input style="text-align:center" type="text" name="class" value="{{$student->class}}" />
                          		</td>
                        	</tr>
                        	<tr>
							    <td style="padding: 10px">Ngày tháng năm sinh:</td>
		                      	<td>
					            	<input style="text-align:center" type="date" name="birthday" value="{{date($student->birthday)}}" />
							    </td>
                        	</tr>
                        	<tr>
                          		<td style="padding: 10px">Địa chỉ:    </td>
                          		<td>
                            		<input style="text-align:center" type="text" name="address" value="{{$student->address}}" />
                          		</td>
                        	</tr>  
                     	</table>
	                    <div class="col-md-2">
	                    </div>
                      	<table class="col-md-5">
							<tr>
							    <td style="padding: 10px">Email</td>
							        <td>
							            <input style="text-align:center" type="text" name="email" value="{{$student->email}}"/>
							        </td>
							</tr>
							<tr>
							    <td style="padding: 10px">Khóa</td>
							    <td>
							        <input style="text-align:center" type="text" name="school_year" value="{{$student->school_year}}"/>
							    </td>
							</tr>
							<tr> 
							    <td style="padding: 10px">Ghi chú </td>
							    <td>
							    	<input style="text-align:center"  type="text" name="note" value="{{$student->note}}" />
							    </td>
							</tr> 
							<tr>
							    <td></td>
							    <td style="padding: 10px; text-align: right ">
							        <input type="submit" class="btn btn-primary" name="update_student" value="Lưu">
							    </td>
							</tr>
                      	</table>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div> 
</div>