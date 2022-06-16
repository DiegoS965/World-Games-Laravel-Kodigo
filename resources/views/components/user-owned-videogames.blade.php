@props(['ownedVideogame'=>$ownedVideogame])

<tr class="bg-Jet border-b dark:bg-gray-800 dark:border-gray-700">
    <td class="px-6 py-4">
        <img src="/VImages/{{$ownedVideogame->image->image}}" class="object-cover h-24 w-52">
    </td>
    <td class="px-6 py-4">{{$ownedVideogame->title}}</td>
    <td class="px-6 py-4">{{Str::limit($ownedVideogame->description,65)}}</td>
    <td class="px-6 py-4">{{$ownedVideogame->genre_name}}</td>
    <td class="px-6 py-4">{{$ownedVideogame->platform_name}}</td>
</tr>