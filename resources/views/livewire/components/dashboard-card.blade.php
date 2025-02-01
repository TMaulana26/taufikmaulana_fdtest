<div class="grid grid-cols-1 gap-6 p-6 sm:grid-cols-2 lg:grid-cols-3">
    <a href="{{ route('reader.index') }}">
        <x-stats-card title="Readers" icon="fa-users" :count="$users" />
    </a>
    <a href="{{ route('author.index') }}">
        <x-stats-card title="Authors" icon="fa-tasks" :count="$authors" />
    </a>
    <a href="{{ route('book.index') }}">
        <x-stats-card title="Books" icon="fa-user-tie" :count="$books" />
    </a>
</div>
