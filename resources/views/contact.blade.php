<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
<div style="max-width:600px; margin:40px auto;">
    
    <h2>Enviar E-mail</h2>

    @if(session('success'))
        <p style="color:green;">{{ session('success') }}</p>
    @endif

    @if($errors->any())
        <ul style="color:red;">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('contact.sendMail') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div style="margin-bottom:15px;">
            <label>E-mail do destinatário</label>
            <input type="email" name="email" 
                   style="width:100%; padding:8px;">
        </div>

        <div style="margin-bottom:15px;">
            <label>Assunto</label>
            <input type="text" name="subject" 
                   style="width:100%; padding:8px;">
        </div>

        <div style="margin-bottom:15px;">
            <label>Mensagem</label>
            <textarea name="message" rows="5" 
                      style="width:100%; padding:8px;"></textarea>
        </div>        
        
        <div style="margin-bottom:15px;">
            <label>Arquivo</label>
           <input type="file" name="file[]"  multiple
                   style="width:100%; padding:8px;">
        </div>

        <button type="submit"
                style="background:#2563eb; color:white; padding:10px 20px; border:none;">
            Enviar E-mail
        </button>
    </form>
</div>
</body>
</html>