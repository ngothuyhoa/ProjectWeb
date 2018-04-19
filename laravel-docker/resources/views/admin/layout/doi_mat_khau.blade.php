 <div class="modal fade" id="changePassword" rolo="dialog">
          <div class="modal-dialog">
            <div class="modal-content" style="width:500px; background-color:#b0dab9">
              <div class="modal-header">
                <h6 class="modal-title" style="text-align: auto-left"><b>Đổi Password</b></h6>
              </div>
              <div class="modal-body">
                <form method="get">
                  <table>
                    <tr>
                      <td style="padding: 10px"> Password cũ :    </td>
                      <td>
                        <input id="oldPassword" type="password" name="oldPassword" value="" onkeyup="get_old_password()"/>
                      </td>
                    </tr> 
                    <tr>
                      <td></td>
                      <td style="padding: 10px; text-align: right " id="next"> 
                      </td>
                    </tr>                    
                  </table>
                </form>
              </div>
              <div class="modal fade" id="saveNewPassword" rolo="dialog">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h6 class="modal-title" style="text-align: auto-left"><b>Password mới</b></h6>
                    </div>
                    <div class="modal-body"> 
                          <form method="POST" action="change_password.php">
                            <table> 
                              <tr>
                                <td style="padding: 10px"> Mật khẩu mới:    </td>
                                <td>
                                  <input id="newPassword" type="password" name="newPassword" value="" onkeyup="check_change_password()"/>
                                </td>
                              </tr> 
                              <tr>
                                <td style="padding: 10px"> Nhập lại mật khẩu mới:    </td>
                                <td>
                                  <input id="newPassword2" type="password" name="newPassword2" value="" onkeyup="check_change_password()"/>
                                </td>
                              </tr>
                              <tr>
                                <td></td>
                                <td style="padding: 10px; text-align: right " id="result">
                                </td>
                              </tr>                    
                            </table>
                          </form>
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
              </div>
            </div>
          </div>
        </div>