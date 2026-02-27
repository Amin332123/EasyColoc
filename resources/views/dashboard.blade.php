<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Easy Coloc – Dashboard</title>
  <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display&family=DM+Sans:wght@400;500;600&display=swap"
    rel="stylesheet" />
  <style>
    *,
    *::before,
    *::after {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    :root {
      --teal-dark: #006d77;
      --teal-mid: #83c5be;
      --teal-light: #edf6f9;
      --white: #ffffff;
      --text: #1a2e31;
      --muted: #5a7c80;
      --border: #cce6ea;
      --danger: #e63946;
      --danger-light: #fdecea;
    }

    body {
      font-family: 'DM Sans', sans-serif;
      background: var(--teal-light);
      color: var(--text);
      min-height: 100vh;
    }

    /* ─── HEADER ─── */
    header {
      background: var(--white);
      box-shadow: 0 2px 10px rgba(0, 109, 119, 0.10);
      position: sticky;
      top: 0;
      z-index: 200;
    }

    .header-inner {
      max-width: 1200px;
      margin: 0 auto;
      padding: 0 32px;
      height: 64px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      gap: 24px;
    }

    .logo {
      font-family: 'DM Serif Display', serif;
      font-size: 1.4rem;
      color: var(--teal-dark);
      text-decoration: none;
    }

    /* ─── TABS ─── */
    .tabs {
      display: flex;
      gap: 4px;
      background: var(--teal-light);
      border-radius: 10px;
      padding: 4px;
    }

    .tab {
      padding: 8px 20px;
      border-radius: 7px;
      font-size: 0.88rem;
      font-weight: 600;
      cursor: pointer;
      border: none;
      background: transparent;
      color: var(--muted);
    }

    .tab.active {
      background: var(--white);
      color: var(--teal-dark);
      box-shadow: 0 2px 8px rgba(0, 109, 119, 0.10);
    }

    .tab:hover:not(.active) {
      color: var(--teal-dark);
    }

    /* ─── HEADER ACTIONS ─── */
    .header-actions {
      display: flex;
      gap: 10px;
    }

    .btn-outline {
      padding: 9px 18px;
      border-radius: 8px;
      font-size: 0.88rem;
      font-weight: 600;
      cursor: pointer;
      background: var(--white);
      color: var(--teal-dark);
      border: 1.5px solid var(--teal-mid);
      font-family: inherit;
    }

    .btn-outline:hover {
      border-color: var(--teal-dark);
    }

    .btn-filled {
      padding: 9px 18px;
      border-radius: 8px;
      font-size: 0.88rem;
      font-weight: 600;
      cursor: pointer;
      background: var(--teal-dark);
      color: var(--white);
      border: none;
      font-family: inherit;
      box-shadow: 0 3px 10px rgba(0, 109, 119, 0.2);
    }

    .btn-filled:hover {
      background: #005960;
    }

    /* ─── MAIN ─── */
    main {
      max-width: 1200px;
      margin: 0 auto;
      padding: 40px 32px;
    }

    /* ─── STAT CARDS ─── */
    .stats-row {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 20px;
      margin-bottom: 40px;
    }

    .stat-card {
      background: var(--white);
      border-radius: 14px;
      padding: 28px 24px;
      box-shadow: 0 4px 18px rgba(0, 109, 119, 0.09);
    }

    .stat-card-label {
      font-size: 0.80rem;
      font-weight: 600;
      text-transform: uppercase;
      letter-spacing: 0.06em;
      color: var(--muted);
      margin-bottom: 10px;
    }

    .stat-card-value {
      font-family: 'DM Serif Display', serif;
      font-size: 2.4rem;
      color: var(--teal-dark);
    }

    .stat-card-sub {
      font-size: 0.82rem;
      color: var(--teal-mid);
      margin-top: 6px;
      font-weight: 500;
    }

    /* ─── USERS SECTION ─── */
    .section-header {
      display: flex;
      align-items: center;
      justify-content: space-between;
      margin-bottom: 20px;
    }

    .section-title {
      font-family: 'DM Serif Display', serif;
      font-size: 1.5rem;
      color: var(--teal-dark);
    }

    .search-input {
      padding: 10px 16px;
      border: 1.5px solid var(--border);
      border-radius: 9px;
      font-family: inherit;
      font-size: 0.9rem;
      color: var(--text);
      background: var(--white);
      outline: none;
      width: 260px;
    }

    .search-input::placeholder {
      color: #aac5ca;
    }

    .search-input:focus {
      border-color: var(--teal-dark);
      box-shadow: 0 0 0 3px rgba(0, 109, 119, 0.08);
    }

    /* ─── USER CARDS ─── */
    .users-list {
      display: flex;
      flex-direction: column;
      gap: 12px;
    }

    .user-card {
      background: var(--white);
      border-radius: 12px;
      padding: 18px 24px;
      box-shadow: 0 3px 14px rgba(0, 109, 119, 0.08);
      display: flex;
      align-items: center;
      gap: 20px;
    }

    .user-avatar {
      width: 44px;
      height: 44px;
      border-radius: 50%;
      background: var(--teal-light);
      color: var(--teal-dark);
      font-weight: 700;
      font-size: 1rem;
      display: flex;
      align-items: center;
      justify-content: center;
      flex-shrink: 0;
    }

    .user-info {
      flex: 1;
    }

    .user-name {
      font-weight: 600;
      font-size: 0.97rem;
      margin-bottom: 3px;
    }

    .user-email {
      font-size: 0.82rem;
      color: var(--muted);
    }

    .user-rep {
      display: flex;
      align-items: center;
      gap: 6px;
      margin-right: 24px;
    }

    .rep-label {
      font-size: 0.80rem;
      color: var(--muted);
      font-weight: 500;
    }

    .rep-value {
      font-weight: 700;
      font-size: 1rem;
      color: var(--teal-dark);
    }

    .user-status {
      font-size: 0.78rem;
      font-weight: 600;
      padding: 3px 10px;
      border-radius: 20px;
      margin-right: 16px;
    }

    .status-active {
      background: #e6f7f5;
      color: #006d77;
    }

    .status-banned {
      background: var(--danger-light);
      color: var(--danger);
    }

    .user-actions {
      display: flex;
      gap: 8px;
    }

    .btn-ban {
      padding: 7px 16px;
      border-radius: 7px;
      font-size: 0.83rem;
      font-weight: 600;
      cursor: pointer;
      background: var(--danger-light);
      color: var(--danger);
      border: 1px solid #f5c0c3;
      font-family: inherit;
    }

    .btn-ban:hover {
      background: #fbd7d8;
    }

    .btn-unban {
      padding: 7px 16px;
      border-radius: 7px;
      font-size: 0.83rem;
      font-weight: 600;
      cursor: pointer;
      background: var(--teal-light);
      color: var(--teal-dark);
      border: 1px solid var(--border);
      font-family: inherit;
    }

    .btn-unban:hover {
      background: #d5eef2;
    }

    /* ─── INVITATIONS TAB ─── */
    .invitations-section {
      display: none;
    }

    .inv-card {
      background: var(--white);
      border-radius: 12px;
      padding: 20px 24px;
      box-shadow: 0 3px 14px rgba(0, 109, 119, 0.08);
      display: flex;
      align-items: center;
      justify-content: space-between;
      margin-bottom: 12px;
    }

    .inv-info strong {
      display: block;
      font-size: 0.97rem;
      margin-bottom: 3px;
    }

    .inv-info span {
      font-size: 0.83rem;
      color: var(--muted);
    }

    .inv-token {
      font-family: monospace;
      font-size: 0.88rem;
      background: var(--teal-light);
      color: var(--teal-dark);
      padding: 4px 12px;
      border-radius: 6px;
      font-weight: 600;
    }

    .inv-actions {
      display: flex;
      gap: 8px;
    }

    .btn-sm-danger {
      padding: 6px 14px;
      border-radius: 7px;
      font-size: 0.82rem;
      font-weight: 600;
      cursor: pointer;
      background: var(--danger-light);
      color: var(--danger);
      border: 1px solid #f5c0c3;
      font-family: inherit;
    }

    /* ─── MODAL ─── */
    .modal-overlay {
      position: fixed;
      inset: 0;
      background: rgba(20, 50, 55, 0.35);
      display: flex;
      align-items: center;
      justify-content: center;
      z-index: 1000;
      opacity: 0;
      pointer-events: none;
    }

    .modal-overlay.open {
      opacity: 1;
      pointer-events: all;
    }

    .modal {
      background: var(--white);
      border-radius: 18px;
      padding: 40px 36px;
      width: 100%;
      max-width: 420px;
      box-shadow: 0 12px 48px rgba(0, 109, 119, 0.18);
    }

    .modal h2 {
      font-family: 'DM Serif Display', serif;
      font-size: 1.55rem;
      color: var(--teal-dark);
      margin-bottom: 8px;
    }

    .modal p {
      font-size: 0.88rem;
      color: var(--muted);
      margin-bottom: 28px;
    }

    .modal label {
      display: block;
      font-size: 0.86rem;
      font-weight: 600;
      margin-bottom: 7px;
      color: var(--text);
    }

    .modal input {
      width: 100%;
      padding: 12px 16px;
      border: 1.5px solid var(--border);
      border-radius: 9px;
      font-family: inherit;
      font-size: 0.95rem;
      color: var(--text);
      outline: none;
      margin-bottom: 24px;
    }

    .modal input:focus {
      border-color: var(--teal-dark);
      box-shadow: 0 0 0 3px rgba(0, 109, 119, 0.10);
    }

    .modal input::placeholder {
      color: #aac5ca;
    }

    .modal-actions {
      display: flex;
      gap: 10px;
    }

    .btn-modal-submit {
      flex: 1;
      background: var(--teal-dark);
      color: var(--white);
      border: none;
      border-radius: 9px;
      padding: 12px;
      font-family: inherit;
      font-size: 0.95rem;
      font-weight: 600;
      cursor: pointer;
      box-shadow: 0 4px 14px rgba(0, 109, 119, 0.22);
    }

    .btn-modal-submit:hover {
      background: #005960;
    }

    .btn-modal-cancel {
      padding: 12px 20px;
      background: var(--teal-light);
      color: var(--muted);
      border: none;
      border-radius: 9px;
      font-family: inherit;
      font-size: 0.95rem;
      font-weight: 600;
      cursor: pointer;
    }

    .avatar {
      max-width: 100%;
      height: auto;
      border-radius: 20px;


    }

    .btn-modal-cancel:hover {
      background: #d9eef3;
    }

    @media(max-width: 768px) {
      .stats-row {
        grid-template-columns: 1fr;
      }

      .header-actions {
        display: none;
      }
    }
  </style>
</head>

<body>

  <header>
    <div class="header-inner">
      <a href="index.html" class="logo">Easy Coloc</a>

      <div class="tabs">

        <button class="tab active" onclick="showTab('dashboard', this)">Dashboard</button>
        <button class="tab" onclick="showTab('invitations', this)">Invitations</button>
      </div>

      <div class="header-actions">
        <a href="{{ route('collocation.show') }}" class="btn-outline">Collocation</a>
        <button class="btn-outline" onclick="openModal('joinModal')">Join Colocation</button>
        <button class="btn-filled" onclick="openModal('createModal')">Create Colocation</button>
        <form method="POST" action="{{ route('logout') }}" class="inline">
          @csrf
          <button type="submit"
            class="text-[10px] uppercase tracking-tighter text-gray-400 hover:text-red-500 transition-colors duration-200">
            {{ __('Logout') }}
          </button>
        </form>
      </div>
    </div>
  </header>
  @if(session('error'))
    <div style="text-align: center; width: 100%; margin-bottom: 20px;">
      <div
        style="background: #fee2e2; color: #b91c1c; padding: 6px 16px; border-radius: 6px; border: 1px solid #fecaca; font-size: 0.85rem; display: inline-flex; align-items: center; box-shadow: 0 2px 4px rgba(0,0,0,0.05);">
        <svg style="width: 14px; height: 14px; margin-right: 8px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
        </svg>
        {{ session('error') }}
      </div>
    </div>

  @elseif ($errors->any())
    <div style="text-align: center; width: 100%; margin-bottom: 20px;">
      <div
        style="background: #fee2e2; color: #b91c1c; padding: 6px 16px; border-radius: 6px; border: 1px solid #fecaca; font-size: 0.85rem; display: inline-flex; align-items: center; box-shadow: 0 2px 4px rgba(0,0,0,0.05);">
        <svg style="width: 14px; height: 14px; margin-right: 8px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
        </svg>
        @foreach ($errors->all() as $error)
          {{ $error }}

        @endforeach
      </div>
    </div>

  @endif

  <main>

    <!-- ─── DASHBOARD TAB ─── -->
    <div id="dashboard">
      <div class="stats-row">
        <div class="stat-card">
          <div class="stat-card-label">Total Users</div>
          <div class="stat-card-value">{{ $users->count() }}</div>
          <div class="stat-card-sub">+34 this month</div>
        </div>
        <div class="stat-card">
          <div class="stat-card-label">Total Colocations</div>
          <div class="stat-card-value">{{ $collocations }}</div>
          <div class="stat-card-sub">Across 14 cities</div>
        </div>
        <div class="stat-card">
          <div class="stat-card-label">Active Colocations</div>
          <div class="stat-card-value">{{ $activeColls }}</div>
          <div class="stat-card-sub">69.9% of total</div>
        </div>
      </div>

      <div class="section-header">
        <div class="section-title">All Users</div>
        <input class="search-input" type="text" placeholder="Search by name..." oninput="filterUsers(this.value)" />
      </div>

      <div class="users-list" id="usersList">
        @foreach ($users as $user)

          <div class="user-card">
            <div class="user-avatar">
              <img class="avatar" src="https://ui-avatars.com/api/?background=random&name={{ $user->name }}" alt="">
            </div>
            <div class="user-info">
              <div class="user-name">{{ $user->name }}</div>
              <div class="user-email">{{ $user->email }}</div>
            </div>
            <div class="user-rep">
              <span class="rep-label">Reputation</span>
              <span class="rep-value">{{ $user->reputation_score }}</span>
            </div>

            <div class="user-actions">

              @if(!$user->is_banned)

                <form action="{{ route('banUser', $user->id) }}" method="post">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn-ban">Ban</button>

                </form>

              @else
                <form action="{{  route('UnbanUser', $user->id) }}" method="post">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn-unban">Unban</button>

                </form>
              @endif




            </div>
          </div>

        @endforeach





      </div>
    </div>

    <!-- ─── INVITATIONS TAB ─── -->
    <div id="invitations" class="invitations-section">
      <div class="section-header" style="margin-bottom:24px;">
        <div class="section-title">Pending Invitations</div>
      </div>
      @foreach ($invitations as $invitation )
      
     
      <div class="inv-card">
        <div class="inv-info">
          <strong>{{ $invitation->colocation->name }}</strong>
          <span>Sent by {{ $invitation->sender->name }} · {{ $invitation->created_at }}</span>
        </div>

        <div style="display:flex;align-items:center;gap:16px;">
          

          <div class="inv-actions" style="display:flex; gap:8px;">
            <form action="{{ route('invitation.accept', $invitation->id ) }}" method="POST">
              @csrf 
              <input type="hidden" name="token" value="{{ $invitation->colocation->token }}">
              <button type="submit" class="btn-sm-success"
                style="background:#10b981; color:white; border:none; padding:6px 12px; border-radius:4px; cursor:pointer; font-weight:600;">
                Accept
              </button>
            </form>

            <form action="{{ route('invitation.decline', $invitation->id ) }}" method="POST">
              @csrf
              <button type="submit" class="btn-sm-danger">
                Decline
              </button>
            </form>
          </div>
        </div>
      </div>
      @endforeach
    </div>

  </main>

  <!-- ─── JOIN MODAL ─── -->
  <form action="{{ route('collocation.join') }}" method="post">
    @csrf
    <div class="modal-overlay" id="joinModal">
      <div class="modal">
        <h2>Join a Colocation</h2>
        <p>Enter the invitation token you received to join an existing colocation.</p>
        <label for="tokenInput">Token number</label>
        <input type="text" id="tokenInput" name="token" placeholder="e.g. TK-4892" />
        <div class="modal-actions">
          <button class="btn-modal-cancel" onclick="closeModal('joinModal')">Cancel</button>
          <button class="btn-modal-submit">Submit</button>
        </div>
      </div>
    </div>
  </form>
  <!-- ─── CREATE MODAL ─── -->
  <form action="{{ route('collocation.store') }}" method="post">
    @csrf
    <div class="modal-overlay" id="createModal">
      <div class="modal">
        <h2>Create a Colocation</h2>
        <p>Give your colocation a name to get started.</p>
        <label for="colocName">Colocation name</label>
        <input type="text" id="colocName" name="name" placeholder="e.g. Coloc Maarif" />
        <div class="modal-actions">
          <button class="btn-modal-cancel" onclick="closeModal('createModal')">Cancel</button>
          <button type="submit" class="btn-modal-submit">Create</button>
        </div>
      </div>
    </div>

  </form>
  <script>

    function openModal(id) { document.getElementById(id).classList.add('open'); }
    function closeModal(id) { document.getElementById(id).classList.remove('open'); }
    function showTab(tab, btn) {
      document.querySelectorAll('.tab').forEach(t => t.classList.remove('active'));
      btn.classList.add('active');
      document.getElementById('dashboard').style.display = tab === 'dashboard' ? 'block' : 'none';
      const inv = document.getElementById('invitations');
      inv.style.display = tab === 'invitations' ? 'block' : 'none';
    }

  </script>
</body>

</html>