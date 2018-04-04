<div class="modal fade" id="updateInfor" rolo="dialog" >
            <div class="modal-dialog " >
              <div class="modal-content " style="width: 800px; background-color:#b0dab9">
                <div class="modal-header">
                  <h6 class="modal-title" style="text-align: auto-left"><b>Profile</b></h6>
                </div>
                <div class="modal-body">
                  <form method="POST" action="update_infor.php" >
                    <div class="row">
                      <table class="col-md-5" >
                        <tr>
                          <td style="padding: 10px">Giới tính   :</td>
                          <td>
                            <select name="gender">
                              <option value="Nam">Nam</option>
                              <option value="Nữ" >Nữ</option>
                            </select> 
                          </td> 
                        </tr>
                        <tr>
                          <td style="padding: 10px">Số điện thoại:</td>
                          <td>
                            <input style="text-align:center" type ="text" name="phone_number" value=""/>
                          </td>
                        </tr>
                        <tr>
                          <td style="padding: 10px">Ngày tháng năm sinh:</td>
                          <td>
                            <input type="date" name="birthday" value="" />
                          </td>
                        </tr> 
                      </table>
                      <div class="col-md-2">
                      </div>
                      <table class="col-md-5">
                        <tr>
                          <td style="padding: 10px">Email</td>
                          <td>
                            <input style="text-align:center" type="text" name="email" value=""/>
                          </td>
                        </tr>
                        <tr>
                          <td style="padding: 10px">Ghi Chú </td>
                          <td>
                            <input style="text-align:center" type="text" name="note" value=""/>
                          </td>
                        </tr> 
                        <tr>
                          <td></td>
                          <td style="padding: 10px; text-align: right ">
                            <input type="submit" class="btn btn-primary" name="update_admin" value="Lưu">
                          </td>
                        </tr>
                      </table>
                    </div>
                  </form>
                </div>