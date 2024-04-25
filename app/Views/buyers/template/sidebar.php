<div class="col-lg-4">
    <div class="card">
        <div class="card-body">
            <div class="d-flex flex-column align-items-center text-center">
                <img src="https://bootdey.com/img/Content/avatar/avatar6.png" alt="Admin" class="rounded-circle p-1 bg-primary" width="110">
                <div class="mt-3">
                    <h4><?= user()->username; ?></h4>
                    <button type="button" class="btn btn-sm btn-outline-primary w-100" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                        Change Picture
                    </button>
                </div>
            </div>
            <hr class="my-4">
            <ul class="list-group list-group-flush">
                <a href="/buyer/order" class="text-decoration-none border-0 rounded-2">
                    <li class="list-group-item d-flex align-items-center flex-wrap border-0 <?= $title == 'Buyer | Order' ? 'active' : ''; ?>"><i class="fas fa-shopping-cart me-3"></i><span>Orders</span></li>
                </a>
                <hr>
                <a href="" class="text-decoration-none border-0 rounded-2">
                    <li class="list-group-item d-flex align-items-center flex-wrap border-0"><i class="fas fa-history me-3"></i><span>History</span></li>
                </a>
                <hr>
                <a href="" class="text-decoration-none border-0 rounded-2">
                    <li class="list-group-item d-flex align-items-center flex-wrap border-0"><i class="fas fa-key me-3"></i><span>Reset Password</span></li>
                </a>
                <hr>
                <a href="/logout" class="text-decoration-none border-0 rounded-2">
                    <li class="list-group-item d-flex align-items-center flex-wrap border-0"><i class="fas fa-sign-out-alt me-3"></i><span>Logout</span></li>
                </a>
            </ul>
        </div>
    </div>
</div>

<!-- Modal Change Profile-->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Change Profile</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>