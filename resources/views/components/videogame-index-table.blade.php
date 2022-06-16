@props(['videogame'=>$videogame])

<tr class="bg-Jet border-b">
    <td class="px-6 py-4">
        <img src="../VImages/{{$videogame->image->image}}" class="object-cover h-24 w-52">
    </td>
    <td class="px-6 py-4"><a href="{{route('videogames.show',$videogame)}}" class="font-medium text-orange-500 hover:underline">{{$videogame->title}}</a></td>
    <td class="px-6 py-4">{{Str::limit($videogame->description,65)}}</td>
    <td class="px-6 py-4">{{$videogame->genre_name}}</td>
    <td class="px-6 py-4">{{$videogame->platform_name}}</td>
    <td class="px-6 py-4">{{$videogame->price}}</td>
    <td class="px-6 py-4"><a href="{{route('users.videogames',$videogame->user)}}" class="font-medium text-orange-500 hover:underline">{{$videogame->user->username}}</a></td>
    <td class="px-6 py-4">{{$videogame->created_at->diffForHumans()}}</td>
</tr>