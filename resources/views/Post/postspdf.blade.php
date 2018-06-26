<table class="table table-dark table-hover">
    <thead>
      <tr>
        <th>S.No</th>
        <th>Title</th>
        <th>Body</th>
        <th>Slug</th>
        <th>Image</th>
        <th>Category</th>
      </tr>
    </thead>
    <tbody>
    @foreach($posts as $post)
    <tr>
        <td>{{ $post->id }}</td>
        <td>{{ $post->title }}</td>
        <td>{{ $post->body }}</td>
        <td>{{ $post->slug }}</td>
        <td><img src="C:\Users\Brown\Downloads\beach-exotic-holiday-248797.jpg" alt="ranga" width="100" height="100"></td>
        <td>
            {{ $post->category->name }}
        </td>
    </tr>
    @endforeach
    </tbody>
  </table>