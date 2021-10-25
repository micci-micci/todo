<x-layout>
    <x-slot name="title">
        Top page
    </x-slot>

    <div class="container">
        <div class="card">
            <p class="title">Todo list</p>
            @error('content')
                <div class="error">{{ $message }}</div>
            @enderror
            <form method="post" action="{{ route('posts.create') }}" class="form-group">
                @csrf

                <input type="text" name="content" placeholder="Enter your todo" class="input" value="{{ old('content') }}">

                <input class="button-add" type="submit" value="追加" />
            </form>
            <table>
                <tr>
                    <th>作成日</th>
                    <th>タスク名</th>
                    <th>更新</th>
                    <th>削除</th>
                </tr>
                @forelse ($posts as $post)
                <tr>
                    <td>
                        <p>{{ $post->created_at }}</p>
                    </td>
                    <form method="post" action="{{ route('posts.update') }}">
                        @method('PATCH')
                        @csrf

                        <td>
                            <input type="text" name="content" class="sub_input" value="{{ $post->content }}">
                        </td>
                        <td>
                            <input class="button-update" type="submit" value="更新" />
                            <input type="hidden" name="id" value="{{ $post->id }}">
                        </td>
                    </form>
                    <form method="post" action="{{ route('posts.destroy') }}" id="delete_post">
                        @method('DELETE')
                        @csrf

                        <td>
                            <input class="button-destroy" type="submit" value="削除" />
                            <input type="hidden" name="id" value="{{ $post->id }}">
                        </td>
                    </form>
                </tr>
                @empty
                    No posts yet
                @endforelse
            </table>
        </div>
    </div>

    <script>
        'use strict'

        {
            document.getElementById('delete_post').addEventListener('submit', e => {
                e.preventDefault();

            if (!confirm('削除しますか？')) {
                return;
            }

            e.target.submit();
            })
        }
    </script>
</x-layout>
