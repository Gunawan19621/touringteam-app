<div class="card">
    <div class="card-body">
        <table id="datatableArea" class="table table-bordered dt-responsive nowrap">
            <thead>
                <tr>
                    <th>No</th>
                    <th> </th>
                    <th>Nama</th>
                    <th>Kontak</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 1;
                @endphp
                @forelse ($group_members as $items)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>
                            <img src="{{ asset('assets/images/users/user-3.jpg') }}" class="rounded-circle avatar-sm"
                                alt="{{ $items->user->fullname }}">
                        </td>
                        <td>{{ $items->user->fullname }}</td>
                        <td>{{ $items->user->no_phone }}</td>
                        <td>
                            @if ($items->status_lead == 'true')
                                <span class="badge badge-soft-success">Admin</span>
                            @else
                                <strong>-</strong>
                            @endif
                        </td>
                        <td>
                            <button type="button"
                                class="btn btn-{{ $items->status_lead == 'true' ? 'info' : 'success' }} btn-xs waves-effect waves-light update-status-lead"
                                data-id="{{ $items->id }}"
                                data-status_lead="{{ $items->status_lead == 'true' ? 'false' : 'true' }}">
                                Jadikan {{ $items->status_lead == 'true' ? 'Anggota' : 'Admin' }}
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" style="text-align: center;">Kosong</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
