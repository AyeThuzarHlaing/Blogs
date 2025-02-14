<x-layout>
<div class="container">
    <form action="">
        <input 
        value="{{request('search')}}"
        name= "search"
        type="text"
        placeholder="search here...."
        >
        <button type="submit">Search</button>
    </form>
       
        @forelse($blogs as $blog)
        <h1><a href="/blogs/{{$blog->slug}}">{{$blog->title}}</a></h1>
        <p>{{substr($blog->body,0,80)}}</p>
        <p>Category - <a href="/categories/{{$blog->category->slug}}">{{$blog->category->name}}</a></p>
        <p>User - <a href="/users/{{$blog->author->username}}">{{$blog->author->username}}</a></p>
        @empty
        <p>no blogs found</p>
        @endforelse

        {{$blogs->links()}}
    </div>

</x-layout>
    
    