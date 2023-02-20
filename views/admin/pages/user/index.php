<h1 class="mb-5">Utilisateurs - Gestion</h1>

<a href="/admin/user/create" class="btn btn-primary nav-btn-top">
    <i class="bi bi-person-add me-1"></i>
    Créer un utilisateur
</a>


<table class="table table-sm table-striped">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Nom</th>
        <th scope="col">Prénom</th>
        <th scope="col">Email</th>
        <th scope="col">Droits</th>
        <th scope="col" class="text-center">Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $users = userGetAll();
    while ($user = $users->fetch_object()) {
        ?>
        <tr>
            <th scope="row"><?= $user->id ?></th>
            <td><?= $user->lastname ?></td>
            <td><?= $user->firstname ?></td>
            <td><?= $user->email ?></td>
            <td>
                <?= $user->admin ?
                    '<span class="badge bg-dark">Admin</span>'
                    :
                    '<span class="badge bg-secondary">Client</span> '
                ?>
            </td>
            <td class="text-center">
                <a href="/admin/user/update?id=<?= $user->id ?>" title="Éditer"><i class="bi bi-pencil-square"></i></a>
                <a href="/admin/user/delete?id=<?= $user->id ?>" title="Supprimer" class="ms-2"><i class="bi bi-trash"></i></a>
            </td>
        </tr>
    <?php } ?>
    </tbody>
</table>