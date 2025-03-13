<?php

namespace App\Mail;

use App\Post;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PostCreatedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $post;

    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    public function build()
    {
        return $this->view('email.Post$post-email[_{{{CITATION{{{_1{](https://github.com/madi-madi/ecommerce-shopping/tree/31f0e3dce166485a8ae346a6acc38eee5440921e/app%2FNotifications%2FNewUser.php)[_{{{CITATION{{{_2{](https://github.com/YaoDanso/AfricaHacks2020-SourceMap/tree/5ad7648b4d6bfc532283e4f4de00d12ca97aec97/app%2FNotifications%2FUserNotification.php)[_{{{CITATION{{{_3{](https://github.com/thiagopda/food-delivery-app/tree/be0f9162add0798edca9b25df2df3e4a1d1087c4/app%2FNotifications%2FAssignedOrder.php)[_{{{CITATION{{{_4{](https://github.com/Byrontosh/05_Correo_Notificaciones/tree/18c8cd295e2143fd2d9f04f11d01243495320368/app%2FNotifications%2FNotificaciones.php');
    }
}
