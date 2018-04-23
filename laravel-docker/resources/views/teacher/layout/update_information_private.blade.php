<?php $teacher = session('teacher'); ?>
<div class ="modal fade" id="updateInforTeacher" rolo="dialog">
	<div class="modal-dialog">
		<div class="modal-content" style="width:800px; background-color:#b0dab9">
			<div class="modal-header">
				<h6 class="modal-title" style="text-align: auto-left"><b>Profile</b></h6>
			</div>
			<div class="modal-body">
				<form method="POST" action="update_information_private_teacher">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<div class="row">
						<table class="col-md-5">
							<tr>
								<td style="padding:10px"> Giới tính   :</td>
								<td>
						          	<select name="gender">
						                <option value="Nam">Nam</option>
						                <option value="Nữ" >Nữ</option>
						            </select> 
						        </td> 
							</tr>
							<tr>
								<td style="padding:10px">Số điện thoại   :</td>
								<td>
							        <input style="text-align:center" type ="text" name="phone_number" value="{{$teacher->phone_number}}"/>
							    </td>
							</tr>
							<tr>
								<td style="padding:10px">Email   :</td>
								<td>
									<input type="text" style="text-align:center" name="email" value="{{$teacher->email}}"/>
								</td>
							</tr>	
						</table>
						<div class="col-md-2">
						</div>
						<table class="col-md-5">
							<tr>
                                <td style="padding: 10px">Ghi Chú </td>
                                <td>
                                    <input style="text-align:center" type="text" name="note" value="{{$teacher->note}}"/>
                                </td>
                            </tr> 
							<tr>
								<td style="padding:10px">Ngày sinh   :</td>
								<td>
									<input type="date" name="birthday" value="{{$teacher->birthday}}" />
								</td>
							</tr>
							<tr>
                          		<td></td>
                          		<td style="padding: 10px; text-align: right ">
                            		<input type="submit" class="btn btn-primary" name="update_teacher" value="Lưu">
                          		</td>
                        	</tr>
						</table>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>