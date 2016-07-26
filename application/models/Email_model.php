<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Email_model extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->library('email');
    }

    public function verification_email($to, $name) {
        $encrypt_email = $this->encrypt->encode($to);
        $link = BASE_URL . 'register/verify_account/' . $encrypt_email;
        $this->email->to($to);
        $this->email->from(EMAIL, 'E-Tiffin center');
        $this->email->subject('Verify Account');
        $this->email->message("Hi $name!\r\nPlease verify your account by clicking on the following link\r\n<a href='$link'>$link</a>");
        $this->email->send();
    }

    public function account_verified_email($to) {
        $this->email->to($to);
        $this->email->from(EMAIL, 'E-Tiffin center');
        $this->email->subject('Account verfication successful.');
        $this->email->message("Hello!\r\nYour email account has been successfully verified. You may know proceed to place orders.");
        $this->email->send();
    }

    public function password_reset_email($to, $password) {
        $this->email->to($to);
        $this->email->from(EMAIL, 'ApnaTiffin.in');
        $this->email->subject('Password reset');
        $this->email->message("Hello!<br>Your new password is:<br><br><strong>$password</strong>");
        $this->email->send();
    }

    public function admin_intimate() {
        $this->email->to('pramodskit@gmail.com');
        $this->email->cc('saurabhg34@gmail.com');
        $this->email->from(EMAIL, 'ApnaTiffin.in');
        $this->email->subject('New Order');
        $this->email->message("Hello!<br>There is a new you order. Please check admin panel for more details.");
        $this->email->send();
    }

}
