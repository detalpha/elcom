<?php 

class Api extends CI_Controller{

    public $mail;
    
    function __construct(){
		parent::__construct();

        //$this->load->library('session');
        $this->load->model('m_api');
	
		// Load PHPMailer library
        $this->load->library('phpmailer_lib');
        
        // PHPMailer object
        $this->mail = $this->phpmailer_lib->load();
        
        // SMTP configuration
        $this->mail->isSMTP();
        $this->mail->Host     = 'smtp.gmail.com';
        $this->mail->SMTPAuth = true;
        $this->mail->Username = '***';
        $this->mail->Password = '***';
        $this->mail->SMTPSecure = '***';
        $this->mail->Port     = 587;
        
        $this->mail->setFrom('***', '***');
        $this->mail->addReplyTo('***', '***');
    }
    
    function sendnotif(){

        $getdata = $this->m_api->get_notif_kontrak();

        foreach ($getdata->result() as $row)
        {
            $emailuser = $row->email_user;
            $arr_emailuser = explode(";", $emailuser);

            foreach($arr_emailuser as $data){

                $this->mail->addAddress($data);
            }

            // uncomment ini untuk production
            // $this->mail->addAddress('***');
                
            // Email subject
            $this->mail->Subject = 'Notif kontrak '.$row->no_kontrak_show;
            
            // Set email format to HTML
            $this->mail->isHTML(true);
            
            // Email body content
            $mailContent = "<p>Durasi kontrak yang sedang dijalankan dengan nomor kontrak '".$row->no_kontrak_show."' akan berakhir pada ".$row->hari." hari. Agar dapat segera dikoordinasikan dan diambil tindakan seperlunya.</p>";
            $this->mail->Body = $mailContent;
            
            // Send email
            if(!$this->mail->send()){
                echo 'Message could not be sent.';
                echo 'Mailer Error: ' . $this->mail->ErrorInfo;
            }
        }

        $getdatb = $this->m_api->get_notif_bg();

        foreach ($getdatb->result() as $row)
        {
            $emailuser = $row->email_user;
            $arr_emailuser = explode(";", $emailuser);

            foreach($arr_emailuser as $data){

                $this->mail->addAddress($data);
            }

            // uncomment ini untuk production
            // $this->mail->addAddress('***');
                
            // Email subject
            $this->mail->Subject = 'Notif Bank Garansi Untuk Kontrak '.$row->no_kontrak_show;
            
            // Set email format to HTML
            $this->mail->isHTML(true);
            
            // Email body content
            $mailContent = "<p>Masa berlaku Bank Garansi untuk kontrak '".$row->no_kontrak_show."' akan berakhir pada ".$row->hari." hari. Agar dapat segera dikoordinasikan dan diambil tindakan seperlunya.</p>";
            $this->mail->Body = $mailContent;
            
            // Send email
            if(!$this->mail->send()){
                echo 'Message could not be sent.';
                echo 'Mailer Error: ' . $this->mail->ErrorInfo;
            }
        }

        $getdatc = $this->m_api->get_notif_garansi();

        foreach ($getdatc->result() as $row)
        {
            $emailuser = $row->email_user;
            $arr_emailuser = explode(";", $emailuser);

            foreach($arr_emailuser as $data){

                $this->mail->addAddress($data);
            }

            // uncomment ini untuk production
            // $this->mail->addAddress('***');
                
            // Email subject
            $this->mail->Subject = 'Notif Untuk Kontrak '.$row->no_kontrak;
            
            // Set email format to HTML
            $this->mail->isHTML(true);
            
            // Email body content
            $mailContent = "<p>Masa berlaku Garansi untuk kontrak '".$row->no_kontrak."' akan berakhir pada ".$row->hari." hari. Agar dapat segera dikoordinasikan dan diambil tindakan seperlunya.</p>";
            $this->mail->Body = $mailContent;
            
            // Send email
            if(!$this->mail->send()){
                echo 'Message could not be sent.';
                echo 'Mailer Error: ' . $this->mail->ErrorInfo;
            }
        }

        echo 'Notif has been sent';
    }

	function sendnotifkontrak(){

        $getdata = $this->m_api->get_notif_kontrak();

        foreach ($getdata->result() as $row)
        {
            $emailuser = $row->email_user;
            $arr_emailuser = explode(";", $emailuser);

            foreach($arr_emailuser as $data){

                $this->mail->addAddress($data);
            }

            // uncomment ini untuk production
            // $this->mail->addAddress('***');
                
            // Email subject
            $this->mail->Subject = 'Notif kontrak '.$row->no_kontrak;
            
            // Set email format to HTML
            $this->mail->isHTML(true);
            
            // Email body content
            $mailContent = "<p>Durasi kontrak yang sedang dijalankan dengan nomor kontrak '".$row->no_kontrak."' akan berakhir pada ".$row->hari." hari. Agar dapat segera dikoordinasikan dan diambil tindakan seperlunya.</p>";
            $this->mail->Body = $mailContent;
            
            // Send email
            if(!$this->mail->send()){
                echo 'Message could not be sent.';
                echo 'Mailer Error: ' . $this->mail->ErrorInfo;
            }else{
                echo 'Message has been sent';
            }
        }
    }
    
    function sendnotifbankgaransi(){

        $getdata = $this->m_api->get_notif_bg();

        foreach ($getdata->result() as $row)
        {
            $emailuser = $row->email_user;
            $arr_emailuser = explode(";", $emailuser);

            foreach($arr_emailuser as $data){

                $this->mail->addAddress($data);
            }

            // uncomment ini untuk production
            // $this->mail->addAddress('***');
                
            // Email subject
            $this->mail->Subject = 'Notif Bank Garansi Untuk Kontrak '.$row->no_kontrak_show;
            
            // Set email format to HTML
            $this->mail->isHTML(true);
            
            // Email body content
            $mailContent = "<p>Masa berlaku Bank Garansi untuk kontrak '".$row->no_kontrak_show."' akan berakhir pada ".$row->hari." hari. Agar dapat segera dikoordinasikan dan diambil tindakan seperlunya.</p>";
            $this->mail->Body = $mailContent;
            
            // Send email
            if(!$this->mail->send()){
                echo 'Message could not be sent.';
                echo 'Mailer Error: ' . $this->mail->ErrorInfo;
            }else{
                echo 'Message has been sent';
            }
        }
    }
    
    function sendnotifgaransi(){

        $getdata = $this->m_api->get_notif_garansi();

        foreach ($getdata->result() as $row)
        {
            $emailuser = $row->email_user;
            $arr_emailuser = explode(";", $emailuser);

            foreach($arr_emailuser as $data){

                $this->mail->addAddress($data);
            }

            // uncomment ini untuk production
            // $this->mail->addAddress('***');
                
            // Email subject
            $this->mail->Subject = 'Notif Untuk Kontrak '.$row->no_kontrak;
            
            // Set email format to HTML
            $this->mail->isHTML(true);
            
            // Email body content
            $mailContent = "<p>Masa berlaku Garansi untuk kontrak '".$row->no_kontrak."' akan berakhir pada ".$row->hari." hari. Agar dapat segera dikoordinasikan dan diambil tindakan seperlunya.</p>";
            $this->mail->Body = $mailContent;
            
            // Send email
            if(!$this->mail->send()){
                echo 'Message could not be sent.';
                echo 'Mailer Error: ' . $this->mail->ErrorInfo;
            }else{
                echo 'Message has been sent';
            }
        }
	}
}
