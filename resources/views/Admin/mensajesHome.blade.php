@extends('Admin.sidebar')
@section('main')
<main class="app-content">
    <div class="recent-orders">
        <h1>Mensajes</h1>

        <form id="markAsReadForm" action="{{ route('markMultipleAsRead') }}" method="post">
            @csrf
            <div class="titleButton">
                <h2>Mensajes recibidos</h2>
                <button type="submit" class="btn btn-primary" id= "markAsReadBtn">Agregar ganado</button>
            </div>
            <table class="table ganado-comercial" id="tableMensajes">
                <thead>
                    <tr>
                      <th><input type="checkbox" id="selectAll" class="messageCheckbox"></th>
                      <th>Nombre</th>
                      <th>Teléfono</th>
                      <th>Mensaje</th>
                      <th>Recibido</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($msg as $m)
                    <tr>
                        <td><input type="checkbox" name="message_ids[]" value="{{ $m->id }}" class="messageCheckbox"></td>
                        <td>{{ $m->nombre }}</td>
                        <td>{{ $m->email }}</td>
                        <td>{{ $m->mensaje }}</td>
                        <td>{{ $m->datecreated }}</td>
                      </tr>
                    @endforeach
                </tbody>
            </table>
        </form>
    </div>
</main>

<!-- right section start-->
<div class="right">
    <div class="top">
        <button id="menu-btn">
            <span class="material-symbols-outlined">menu</span>
        </button>
        <div class="theme-toggler">
            <span class="material-symbols-outlined active">light_mode</span>
            <span class="material-symbols-outlined">dark_mode</span>
        </div>
        <div class="profile">
            <div class="info">
                <p>Bienvenido ganadero <b>Nombre</b></p>
                <small class="text-muted">Admin</small>
            </div>
            <div class="profile-photo">
                <img src="" alt="">
            </div>
        </div>
    </div>
    <!-- End of top -->
    <div class="recent-updates">
        <h2>Recent-updates</h2>
        <div class="updates">
            <div class="update">
                <div class="profile-photo">
                    <img src="" alt="">
                </div>
                <div class="message">
                    <p><b>Mario Fly</b> publicó un nuevo ganado</p>
                    <small class="text-muted">Hace 2 minutos</small>
                </div>
            </div>
            <div class="update">
                <div class="profile-photo">
                    <img src="images/OIP.jpeg" alt="">
                </div>
                <div class="message">
                    <p><b>Purina</b> publicó una nueva oferta para ti</p>
                    <small class="text-muted">Hace 2 minutos</small>
                </div>
            </div>
        </div>
    </div>

    <div class="recent-publicidad">
        <h2>Los mejores productos</h2>
        <div class="publicidad">
            <img src="./images/publicidad-app.png" alt="">
        </div>
    </div>
</div>
<!-- right section end-->

<script>
document.addEventListener('DOMContentLoaded', function() {
    const selectAllCheckbox = document.getElementById('selectAll');
    const checkboxes = document.querySelectorAll('.messageCheckbox');
    const markAsReadBtn = document.getElementById('markAsReadBtn');

    selectAllCheckbox.addEventListener('change', function() {
        checkboxes.forEach(checkbox => checkbox.checked = selectAllCheckbox.checked);
        toggleSubmitButton();
    });

    checkboxes.forEach(checkbox => {
        checkbox.addEventListener('change', toggleSubmitButton);
    });

    function toggleSubmitButton() {
        const selectedMessages = Array.from(checkboxes).filter(checkbox => checkbox.checked);
        markAsReadBtn.disabled = selectedMessages.length === 0;
    }
});
</script>
@endsection
