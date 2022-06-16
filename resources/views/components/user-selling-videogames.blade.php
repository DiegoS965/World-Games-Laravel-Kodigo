@props(['videogame'=>$videogame])

<tr class="bg-Jet border-b dark:bg-gray-800 dark:border-gray-700">
    <td class="px-6 py-4">
        <img src="/VImages/{{$videogame->image->image}}" class="object-cover h-24 w-52">
    </td>
    <td class="px-6 py-4"><a href="{{route('videogames.show',$videogame)}}" class="font-medium text-orange-500 hover:underline">{{$videogame->title}}</a></td>
    <td class="px-6 py-4">{{Str::limit($videogame->description,65)}}</td>
    <td class="px-6 py-4">{{$videogame->genre_name}}</td>
    <td class="px-6 py-4">{{$videogame->platform_name}}</td>
    <td class="px-6 py-4">{{$videogame->price}}</td>
    @can('update', $videogame)
        <td class="px-6 py-4">
            <div class="m-1">
                <a href = "{{route('videogames.update.index',$videogame)}}" class="bg-red-900 hover:bg-youtubeRed text-white px-4 py-3 rounded font-medium">Edit</a>
            </div><br>
    @endcan
    @can('delete', $videogame)
            <div class="m-1">
                <form action = "{{route('videogames.destroy',$videogame)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-900 hover:bg-youtubeRed text-white px-4 py-3 rounded font-medium">Delete</button>
                </form>
            </div>
        </td>
    @endcan
</tr>