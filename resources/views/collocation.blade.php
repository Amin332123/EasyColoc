<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Easy Coloc – Colocation</title>
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
      --green: #2a9d6e;
      --green-light: #e6f7f0;
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

    .header-title {
      font-family: 'DM Serif Display', serif;
      font-size: 1.1rem;
      color: var(--text);
    }

    .breadcrumb {
      font-size: 0.85rem;
      color: var(--muted);
    }

    .breadcrumb a {
      color: var(--teal-dark);
      text-decoration: none;
    }

    .breadcrumb a:hover {
      text-decoration: underline;
    }

    .header-btns {
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
      font-size: 0.78rem;
      font-weight: 600;
      text-transform: uppercase;
      letter-spacing: 0.07em;
      color: var(--muted);
      margin-bottom: 10px;
    }

    .stat-card-value {
      font-family: 'DM Serif Display', serif;
      font-size: 2.2rem;
      color: var(--teal-dark);
    }

    .stat-card-sub {
      font-size: 0.82rem;
      color: var(--teal-mid);
      margin-top: 6px;
      font-weight: 500;
    }

    /* ─── SECTION HEADER ─── */
    .section-header {
      display: flex;
      align-items: center;
      justify-content: space-between;
      margin-bottom: 20px;
      flex-wrap: wrap;
      gap: 12px;
    }

    .section-title {
      font-family: 'DM Serif Display', serif;
      font-size: 1.45rem;
      color: var(--teal-dark);
    }

    /* ─── EXPENSES LIST ─── */
    .expenses-controls {
      display: flex;
      gap: 12px;
      align-items: center;
    }

    .search-input {
      padding: 9px 16px;
      border: 1.5px solid var(--border);
      border-radius: 9px;
      font-family: inherit;
      font-size: 0.88rem;
      color: var(--text);
      background: var(--white);
      outline: none;
      width: 200px;
    }

    .search-input::placeholder {
      color: #aac5ca;
    }

    .search-input:focus {
      border-color: var(--teal-dark);
      box-shadow: 0 0 0 3px rgba(0, 109, 119, 0.08);
    }

    select.month-select {
      padding: 9px 14px;
      border: 1.5px solid var(--border);
      border-radius: 9px;
      font-family: inherit;
      font-size: 0.88rem;
      color: var(--text);
      background: var(--white);
      outline: none;
      cursor: pointer;
    }

    select.month-select:focus {
      border-color: var(--teal-dark);
    }

    /* ─── EXPENSE CARDS ─── */
    .expenses-list {
      display: flex;
      flex-direction: column;
      gap: 12px;
      margin-bottom: 48px;
    }

    .expense-card {
      background: var(--white);
      border-radius: 12px;
      padding: 18px 24px;
      box-shadow: 0 3px 14px rgba(0, 109, 119, 0.08);
      display: flex;
      align-items: center;
      gap: 16px;
    }

    .expense-icon {
      width: 42px;
      height: 42px;
      border-radius: 10px;
      background: var(--teal-light);
      display: flex;
      align-items: center;
      justify-content: center;
      flex-shrink: 0;
    }

    .expense-icon-inner {
      width: 18px;
      height: 18px;
      border-radius: 50%;
      background: var(--teal-mid);
    }

    .expense-info {
      flex: 1;
    }

    .expense-desc {
      font-weight: 600;
      font-size: 0.95rem;
      margin-bottom: 4px;
    }

    .expense-meta {
      font-size: 0.82rem;
      color: var(--muted);
    }

    .expense-amount {
      font-family: 'DM Serif Display', serif;
      font-size: 1.25rem;
      color: var(--teal-dark);
      font-weight: 700;
      margin-right: 16px;
    }

    .badge-category {
      background: var(--teal-light);
      color: var(--teal-dark);
      font-size: 0.76rem;
      font-weight: 600;
      padding: 3px 10px;
      border-radius: 20px;
      margin-right: 16px;
    }

    .badge-paid {
      background: var(--green-light);
      color: var(--green);
      font-size: 0.76rem;
      font-weight: 600;
      padding: 3px 10px;
      border-radius: 20px;
      margin-right: 16px;
    }

    .expense-actions {
      display: flex;
      gap: 8px;
    }

    .btn-mark {
      padding: 7px 14px;
      border-radius: 7px;
      font-size: 0.82rem;
      font-weight: 600;
      cursor: pointer;
      background: var(--green-light);
      color: var(--green);
      border: 1px solid #b6e8d4;
      font-family: inherit;
    }

    .btn-mark:hover {
      background: #cdf0e3;
    }

    .btn-delete {
      padding: 7px 14px;
      border-radius: 7px;
      font-size: 0.82rem;
      font-weight: 600;
      cursor: pointer;
      background: var(--danger-light);
      color: var(--danger);
      border: 1px solid #f5c0c3;
      font-family: inherit;
    }

    .btn-delete:hover {
      background: #fbd7d8;
    }

    /* ─── DEBTS SECTION ─── */
    .debts-list {
      display: flex;
      flex-direction: column;
      gap: 12px;
    }

    .debt-card {
      background: var(--white);
      border-radius: 12px;
      padding: 18px 24px;
      box-shadow: 0 3px 14px rgba(0, 109, 119, 0.08);
      display: flex;
      align-items: center;
      gap: 16px;
    }

    .debt-dot {
      width: 10px;
      height: 10px;
      border-radius: 50%;
      background: var(--danger);
      flex-shrink: 0;
      margin: 0 6px;
    }

    .debt-text {
      flex: 1;
      font-size: 0.95rem;
      font-weight: 500;
    }

    .debt-text strong {
      color: var(--teal-dark);
    }

    .btn-pay {
      padding: 8px 20px;
      border-radius: 8px;
      font-size: 0.84rem;
      font-weight: 600;
      cursor: pointer;
      background: var(--teal-dark);
      color: var(--white);
      border: none;
      font-family: inherit;
      box-shadow: 0 3px 10px rgba(0, 109, 119, 0.18);
    }

    .btn-pay:hover {
      background: #005960;
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
      max-width: 440px;
      box-shadow: 0 12px 48px rgba(0, 109, 119, 0.18);
    }

    .modal h2 {
      font-family: 'DM Serif Display', serif;
      font-size: 1.55rem;
      color: var(--teal-dark);
      margin-bottom: 8px;
    }

    .modal-sub {
      font-size: 0.88rem;
      color: var(--muted);
      margin-bottom: 28px;
    }

    .form-group {
      margin-bottom: 18px;
    }

    .form-group label {
      display: block;
      font-size: 0.86rem;
      font-weight: 600;
      margin-bottom: 7px;
      color: var(--text);
    }

    .form-group input,
    .form-group select {
      width: 100%;
      padding: 12px 16px;
      border: 1.5px solid var(--border);
      border-radius: 9px;
      font-family: inherit;
      font-size: 0.93rem;
      color: var(--text);
      background: var(--white);
      outline: none;
    }

    .form-group input::placeholder {
      color: #aac5ca;
    }

    .form-group input:focus,
    .form-group select:focus {
      border-color: var(--teal-dark);
      box-shadow: 0 0 0 3px rgba(0, 109, 119, 0.10);
    }

    .modal-actions {
      display: flex;
      gap: 10px;
      margin-top: 26px;
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

    .btn-modal-cancel:hover {
      background: #d9eef3;
    }

    @media(max-width: 768px) {
      .stats-row {
        grid-template-columns: 1fr;
      }

      .expenses-controls {
        flex-direction: column;
        align-items: flex-start;
      }
    }
  </style>
</head>

<body>

  <header>
    <div class="header-inner">
      <div>
        <a href="admin.html" class="logo">Easy Coloc</a>
      </div>
      <div style="text-align:center;">
        <div class="header-title">Coloc Maarif</div>
        <div class="breadcrumb"><a href="admin.html">Dashboard</a> / Coloc Maarif</div>
      </div>
      <div class="header-btns">
        <a href="{{ route('dashboard') }}" class="btn-outline">Dashboard</a>
        <button class="btn-outline" onclick="openModal('categoryModal')">Create Category</button>
        <button class="btn-filled" onclick="openModal('expenseModal')">Add Expense</button>
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


  <main>
    <h2>{{ $userCollocation->name }}</h2>


    
    <!-- ─── STATS ─── -->
    <div class="stats-row">
      <div class="stat-card">
        <div class="stat-card-label">Total Expenses</div>
        <div class="stat-card-value">{{ $TotalExpenses }}$</div>
        <div class="stat-card-sub">This month</div>
      </div>
      <div class="stat-card">
        <div class="stat-card-label">Individual Expenses</div>
        <div class="stat-card-value">{{ number_format($individualExpenses, 2) }} $</div>
        <div class="stat-card-sub">Your share ({{ $membersNumber }} members)</div>
      </div>
      <div class="stat-card">
        <div class="stat-card-label">Balance</div>
        @if ($balance > 0)
          <div class="stat-card-value" style="color:#2a9d6e;">+{{ number_format($balance, 2)}} $</div>
        @elseif ($balance < 0)
          <div class="stat-card-value" style="color:#ff0000;">{{ number_format($balance, 2) }} $</div>

        @else
          <div class="stat-card-value" style="color:#808080;">{{ number_format($balance, 2) }} $</div>

        @endif
        <div class="stat-card-sub">You are owed money</div>
      </div>
    </div>

    <!-- ─── EXPENSES ─── -->
    <div class="section-header">
      <div class="section-title">Expenses</div>
      <div class="expenses-controls">
        <input class="search-input" type="text" placeholder="Search expenses..." />
        <select class="month-select">
          <option value="">All months</option>
          <option>January</option>
          <option>February</option>
          <option selected>March</option>
          <option>April</option>
          <option>May</option>
          <option>June</option>
          <option>July</option>
          <option>August</option>
          <option>September</option>
          <option>October</option>
          <option>November</option>
          <option>December</option>
        </select>
      </div>
    </div>

    <div class="expenses-list">

      @foreach ($expenses as $expense)
        <div class="expense-card">
          <div class="expense-icon">
            <div class="expense-icon-inner"></div>
          </div>
          <div class="expense-info">
            <div class="expense-desc">{{ $expense->user->name }} paid {{ $expense->categorie->name }}</div>
            <div class="expense-meta">{{ $expense->created_at }}</div>
          </div>
          <span class="badge-category"></span>
          <div class="expense-amount">{{ $expense->amount }} $</div>
          <div class="expense-actions">
            @if ($expense->payer_id == auth()->id())
              <button class="btn-mark">Mark as paid</button>
              <button class="btn-delete">Delete</button>
            @endif
          </div>
        </div>


      @endforeach



    </div>

    <!-- ─── DEBTS ─── -->
    <div class="section-header">
      <div class="section-title">What you owe</div>
    </div>
    <div class="debts-list">
      @forelse($finalDebts as $debt)
        <div class="debt-card">
          <div class="debt-dot"></div>

          <div class="debt-text">
            @if($debt['from']->id === auth()->id())

              You owe <strong>{{ $debt['to']->name }}</strong> {{ $debt['amount'] }} $
            @else
              {{-- Scenario: Someone else owes money --}}
              <strong>{{ $debt['from']->name }}</strong> owes
              <strong>{{ $debt['to']->name }}</strong> {{ $debt['amount'] }} $
            @endif
          </div>

          @if($debt['from']->id === auth()->id())

            <form action="{{ route('payments.settle', $debt['to']->id) }}" method="POST" style="margin: 0;">
              @csrf
              <button type="submit" class="btn-pay">Pay</button>
            </form>
          @endif
        </div>
      @empty
        <div class="debt-card">
          <div class="debt-text">Everyone is square! No debts found. 🍻</div>
        </div>
      @endforelse
    </div>
  </main>

  <form action="{{ route('expense.store') }}" method="post">
    @csrf
    <div class="modal-overlay" id="expenseModal">
      <div class="modal">
        <h2>Add an Expense</h2>
        <p class="modal-sub">Log a shared expense for your colocation.</p>


        <div class="form-group">
          <label>Amount ($)</label>
          <input type="number" name="amount" placeholder="e.g. 120" min="0" required />
        </div>


        <div class="form-group">
          <label>Who paid?</label>
          <select name="payer" required>
            <option value="" disabled selected>Select a member</option>
            @foreach ($roommates as $roommate)
              <!-- FIX: Add value="{{ $roommate->id }}" to send ID not name -->
              <option value="{{ $roommate->id }}">{{ $roommate->name }}</option>
            @endforeach
          </select>
        </div>


        <div class="form-group">
          <label>Category</label>
          <select name="category" required>
            <option value="" disabled selected>Select a category</option>
            @foreach ($categories as $category)

              <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
          </select>
        </div>

        <div class="modal-actions">
          <button class="btn-modal-cancel" type="button" onclick="closeModal('expenseModal')">Cancel</button>
          <button type="submit" class="btn-modal-submit">Add Expense</button>
        </div>
      </div>
    </div>
  </form>


  <div class="modal-overlay" id="categoryModal">
    <div class="modal">
      <h2>Create a Category</h2>
      <p class="modal-sub">Add a new expense category for your colocation.</p>
      <div class="form-group">
        <label>Category name</label>
        <input type="text" placeholder="e.g. Rent, Groceries..." />
      </div>
      <div class="modal-actions">
        <button class="btn-modal-cancel" onclick="closeModal('categoryModal')">Cancel</button>
        <button class="btn-modal-submit">Create</button>
      </div>
    </div>
  </div>
  <h3> give this token in invitation :  {{ $userCollocation->token }}</h3>

  <script>
    function openModal(id) { document.getElementById(id).classList.add('open'); }
    function closeModal(id) { document.getElementById(id).classList.remove('open'); }
    document.querySelectorAll('.modal-overlay').forEach(m => {
      m.addEventListener('click', e => { if (e.target === m) m.classList.remove('open'); });
    });
  </script>
</body>

</html>