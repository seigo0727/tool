<!— サイドメニュー -->
<nav class="border-end bg-white">
    <div class="border-bottom text-center">
        {{ config('app.name', 'Laravel') }}
    </div>
    <ul class="nav flex-column m-0 p-3">
        <li class="nav-item mb-2"><a href="#" class="nav-link">Python</a></li>
        <li class="nav-item mb-2"><a href="#" class="nav-link">Django</a></li>
    </ul>
    <div class="border-bottom text-center">
        開発
    </div>
    <ul class="nav flex-column m-0 p-3">
        <li class="nav-item mb-2"><a href="{{ route('admin.master.development.command.index') }}" class="nav-link">コマンド</a></li>
        <li class="nav-item mb-2"><a href="{{ route('admin.master.development.phpinfo.index') }}" class="nav-link">PHP情報</a></li>
    </ul>

</nav>
