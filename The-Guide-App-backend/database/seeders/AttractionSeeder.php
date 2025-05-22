<?php

namespace Database\Seeders;
use App\Models\Attractions;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AttractionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Attractions::insert([
            [
                'name' => 'Tangier American Legation',
                'description' => 'First American public property outside the US and now a museum.',
                'location' => 'Tangier',
                'category' => 'Museum',
                'image' => 'https://imgs.search.brave.com/vwxbhy8iVOvhyWjHWGiKPMNMPEBRlbeNmi-RG4m9b_s/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9kaXBs/b21hY3kuc3RhdGUu/Z292L3dwLWNvbnRl/bnQvdXBsb2Fkcy8y/MDIzLzA4LzIwMjIw/NzEzXzA5NDI1MjM1/MV9pT1NfaGVhZGVy/LXNjYWxlZC5qcGc',
                'city' => 'Tangier',
                'social_hours' => '10:00 AM - 5:00 PM'
            ],
            [
                'name' => 'Cape Malabata',
                'description' => 'Scenic cape with lighthouse and panoramic views of the Strait of Gibraltar.',
                'location' => 'Tangier',
                'category' => 'Viewpoint',
                'image' => 'https://imgs.search.brave.com/JwUyZddvGznXlGSOmRkwdt3fkZRJtDTq_VyhRay5x7A/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly93d3cu/YmFyY2Vsby5jb20v/Z3VpYS10dXJpc21v/L3dwLWNvbnRlbnQv/dXBsb2Fkcy8yMDIy/LzAxL3Rhbmdlci1t/YWxhYmF0YS04ODgu/anBn',
                'city' => 'Tangier',
                'social_hours' => '24/7'
            ],
            [
                'name' => 'The Royal Palace',
                'description' => 'Official residence of the King in Tangier (view from outside).',
                'location' => 'Tangier',
                'category' => 'Historic Site',
                'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/f/f3/Morocco_Marshan_Palace_Tanger.jpg/800px-Morocco_Marshan_Palace_Tanger.jpg',
                'city' => 'Tangier',
                'social_hours' => '24/7'
            ],
            [
                'name' => 'Caves of Hercules',
                'description' => 'Natural caves with legendary connections to Hercules and ocean views.',
                'location' => 'Tangier',
                'category' => 'Natural Attraction',
                'image' => 'https://t3.ftcdn.net/jpg/01/32/84/58/240_F_132845851_RmJ2Y5PoWFuh1oIA7hB96YUyCExOcDgu.jpg',
                'city' => 'Tangier',
                'social_hours' => '9:00 AM - 7:00 PM'
            ],
            [
                'name' => 'Church of Saint Andrew',
                'description' => 'Anglican church with unique Moorish-style architecture.',
                'location' => 'Tangier',
                'category' => 'Religious Site',
                'image' => 'https://imgs.search.brave.com/lilGmJbwSAxcGOhpbCvUx0A5htayLEZRpQZR4oK_4cE/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly91cGxv/YWQud2lraW1lZGlh/Lm9yZy93aWtpcGVk/aWEvY29tbW9ucy81/LzVlL1Rhbmdlcl8t/X2FuZ2xpa2FuaXNj/aGVfS2lyY2hlLkpQ/Rw',
                'city' => 'Tangier',
                'social_hours' => '9:00 AM - 5:00 PM'
            ],
            [
                'name' => 'Jardins de Al-Mendoubia',
                'description' => 'Beautiful gardens with ancient trees near the Grand Socco.',
                'location' => 'Tangier',
                'category' => 'Park',
                'image' => 'https://imgs.search.brave.com/9_22irMurrLddhZiokhZITPrKDAIf2glN67AjJ4JIEI/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9pbWFn/ZXMuY3RmYXNzZXRz/Lm5ldC9zeXI3bmR6/dmd6bDAvM0hiNkUy/SHhHSWtlNm9LWkxB/Uzl3Yy9iNjMxMGNi/MzAxM2JiZDg5NGFm/ZTEzMjNiZjFhODFk/OS9TYW5zX3RpdHJl/X184Ml8ucG5nP3c9/MTIwMCZoPTYyOCZm/bT1hdmlmJnE9ODA',
                'city' => 'Tangier',
                'social_hours' => '8:00 AM - 8:00 PM'
            ],
            [
                'name' => 'Bab Al Fahs',
                'description' => 'Historic gate leading to the old medina.',
                'location' => 'Tangier',
                'category' => 'Historic Site',
                'image' => 'https://itin-dev.wanderlogstatic.com/freeImage/3SHt7PhOA0LFtDXWauPlGIjSO0VcTaLX',
                'city' => 'Tangier',
                'social_hours' => '24/7'
            ],
            [
                'name' => 'Plaza de Toros',
                'description' => 'Abandoned bullring with interesting architecture and city views.',
                'location' => 'Tangier',
                'category' => 'Historic Site',
                'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/b/ba/PlazaTorosTanger.jpg/1024px-PlazaTorosTanger.jpg',
                'city' => 'Tangier',
                'social_hours' => '24/7'
            ],
            [
                'name' => 'The Tomb of Ibn Battouta',
                'description' => 'Monument honoring the famous Moroccan explorer.',
                'location' => 'Tangier',
                'category' => 'Historic Site',
                'image' => 'https://imgs.search.brave.com/wm7_v2TEoOPBPfSasd8iZ4oX6uC5g1o_O2mj2ORiF-g/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly91cGxv/YWQud2lraW1lZGlh/Lm9yZy93aWtpcGVk/aWEvY29tbW9ucy9h/L2FkL01vcm9jY29f/VGFuZ2llcl9JYm5C/YXR0dXRhLmpwZw',
                'city' => 'Tangier',
                'social_hours' => '24/7'
            ],
            [
                'name' => 'The Grand Socco',
                'description' => 'Historic square and gateway between new town and medina.',
                'location' => 'Tangier',
                'category' => 'Square',
                'image' => 'https://imgs.search.brave.com/57W2JVKJxf45W_SeeQC8rkCLtPyNrNEoyi-BZLFfeTc/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly91cGxv/YWQud2lraW1lZGlh/Lm9yZy93aWtpcGVk/aWEvY29tbW9ucy9j/L2NmL01vcm9jY29f/VGFuZ2llcl9QZXRp/dF9Tb2Njby5qcGc',
                'city' => 'Tangier',
                'social_hours' => '24/7'
            ],
            [
                'name' => 'The Charf Hill',
                'description' => 'Hilltop area offering panoramic views of Tangier.',
                'location' => 'Tangier',
                'category' => 'Viewpoint',
                'image' => 'https://imgs.search.brave.com/nBB_DH1_6vtXrqD_nHOct0Rou2Vd-kEkbazUb9RJa00/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly93d3cu/d29ybGRpbnByaW50/LmNvbS9wLzE5MS92/aWV3LXRhbmdpZXIt/Y2hhcmYtaGlsbC10/YW5naWVyLTU5MjQ3/NjQuanBn',
                'city' => 'Tangier',
                'social_hours' => '24/7'
            ],
            [
                'name' => 'Medina Art Gallery',
                'description' => 'Contemporary art gallery in the heart of the medina.',
                'location' => 'Tangier',
                'category' => 'Gallery',
                'image' => 'https://imgs.search.brave.com/Pn5rrkTMhVQ93rKNPtYVHz--OiwHEoCXWMahPlcNhQA/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9yZW5k/ZXIuZmluZWFydGFt/ZXJpY2EuY29tL2lt/YWdlcy9yZW5kZXJl/ZC9tZWRpdW0vcHJp/bnQvOC84L2JyZWFr/L2ltYWdlcy9hcnR3/b3JraW1hZ2VzL21l/ZGl1bS8zL3Rhbmdp/ZXItZG9vcnMtMDIt/cmljay1waXBlci1w/aG90b2dyYXBoeS5q/cGc',
                'city' => 'Tangier',
                'social_hours' => '10:00 AM - 6:00 PM'
            ],
            [
                'name' => 'Grande Mosque of Tangier',
                'description' => 'Historic mosque in the medina with beautiful architecture.',
                'location' => 'Tangier',
                'category' => 'Religious Site',
                'image' => 'https://imgs.search.brave.com/cHpQn5MHTjZW4kt3T8P0rPU04sy39eiV0hzfX709fLU/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly93d3cu/YmFyY2Vsby5jb20v/Z3VpYS10dXJpc21v/L3dwLWNvbnRlbnQv/dXBsb2Fkcy8yMDI0/LzA5L29rLWdyYW4t/bWV6cXVpdGEtdGFu/Z2VyLmpwZw',
                'city' => 'Tangier',
                'social_hours' => 'Outside prayer times'
            ],
            [
                'name' => 'Fondation Lorin',
                'description' => 'Small gallery of old Tangier photos & history.',
                'location' => 'Tangier',
                'category' => 'Museum',
                'image' => 'https://imgs.search.brave.com/dO0MmxCBE6CZFZDZC-W5-PKPnLeBJfC-BFna5a8mwNI/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly91cGxv/YWQud2lraW1lZGlh/Lm9yZy93aWtpcGVk/aWEvY29tbW9ucy9h/L2FlL0ZvbmRhdGlv/bl9Mb3Jpbl9UYW5n/ZXJfQXVzc3RlbGx1/bmdzcmF1bV8yLmpw/Zw',
                'city' => 'Tangier',
                'social_hours' => '10:00 AM - 6:00 PM'
            ],
            [
                'name' => 'Parc Perdicaris',
                'description' => 'Forest walks and ocean cliff views.',
                'location' => 'Tangier',
                'category' => 'Park',
                'image' => 'https://dynamic-media-cdn.tripadvisor.com/media/photo-o/17/b1/d6/c6/parc-perdicaris.jpg?w=700&h=400&s=1',
                'city' => 'Tangier',
                'social_hours' => '8:00 AM - 8:00 PM'
            ],
            [
                'name' => 'Old City and Medina',
                'description' => 'Historic heart of Tangier with winding alleys and traditional shops.',
                'location' => 'Tangier',
                'category' => 'Historic Site',
                'image' => 'https://imgs.search.brave.com/5uFHaDUvLpQZGoyQISBzfFSu19wEY4581t--pXFfUiU/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9tZWRp/YS5nZXR0eWltYWdl/cy5jb20vaWQvMTI1/MjUzMTEyMS9waG90/by90YW5naWVyLXRh/bmdlci10ZXRvdWFu/LWFsLWhvY2VpbWEt/bW9yb2Njby1uYXJy/b3ctc3RyZWV0cy1w/YWludGVkLXdoaXRl/LWFuZC1ibHVlLWxp/bmVkLXdpdGguanBn/P3M9NjEyeDYxMiZ3/PTAmaz0yMCZjPUgz/RjA0dW9jTl9xMFJr/V3NSLUVzbjlpZWVI/VlozaWttY21oNFNM/a2RtTVU9',
                'city' => 'Tangier',
                'social_hours' => '24/7'
            ],
            [
                'name' => 'Café Hafa',
                'description' => 'Legendary cliffside café with ocean views.',
                'location' => 'Tangier',
                'category' => 'Café',
                'image' => 'https://imgs.search.brave.com/xPdrsCGtU_n3yDddIOnjYasLMEBHkwZCvanCXfX0kqQ/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly90b2ls/ZXQtZ3VydS5jb20v/Y2FmZS1oYWZhL3Bp/Y3R1cmVzL2NhZmUt/aGFmYS0xMDEwXzEz/MzkzMC5qcGc',
                'city' => 'Tangier',
                'social_hours' => '8:00 AM - 10:00 PM'
            ],
            [
                'name' => 'Dar el Makhzen',
                'description' => 'Museum inside a palace.',
                'location' => 'Tangier',
                'category' => 'Museum',
                'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/b/b0/Tangier_city_museum_enclave.jpg/330px-Tangier_city_museum_enclave.jpg',
                'city' => 'Tangier',
                'social_hours' => '9:00 AM - 5:00 PM'
            ],
            [
                'name' => 'Sidi Kacem Beach',
                'description' => 'Relaxed beach outside the city center.',
                'location' => 'Tangier',
                'category' => 'Beach',
                'image' => 'https://imgs.search.brave.com/3HypWkv6WaRsWKFbcPGNzIWB9f14vZbbkbPXaggxKRY/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9iZWFj/aGVzLXNlYXJjaGVy/LmNvbS9pbWFnZXMv/YmVhY2hlcy81MDQy/MDEwNzUvTUEyMDEw/NzVfZml0XzU1MF8z/MDAuanBn',
                'city' => 'Tangier',
                'social_hours' => '24/7'
            ],
            [
                'name' => 'Petit Socco',
                'description' => 'Historic small square in the medina with cafés.',
                'location' => 'Tangier',
                'category' => 'Square',
                'image' => 'https://imgs.search.brave.com/sk9bBypmUHXbomPHc6M-YHaytws33ky1QNKE4jHh62M/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9waG90/bzYyMHg0MDAubW5z/dGF0aWMuY29tL2M3/Nzg3MTJhMTcyMGVh/NDcwZDIzMzY5YThj/YTMzMjQ1L3BldGl0/LXNvY2NvLmpwZw',
                'city' => 'Tangier',
                'social_hours' => '24/7'
            ],
            [
                'name' => 'Mnar Park',
                'description' => 'Family-friendly park with fun activities.',
                'location' => 'Tangier',
                'category' => 'Park',
                'image' => 'https://imgs.search.brave.com/Y7TQlvepAtc9tGafrVJDojGFODWs_SGg0EJLNroaP80/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly93d3cu/a2F5YWsuZnIvcmlt/Zy9oaW1nL2FmLzlj/LzU0L2V4cGVkaWFf/Z3JvdXAtMjAyMTIw/MS02MjJiOTUtMjM4/NDkzLmpwZz93aWR0/aD0xMzY2JmhlaWdo/dD03NjgmY3JvcD10/cnVl',
                'city' => 'Tangier',
                'social_hours' => '9:00 AM - 7:00 PM'
            ],
            [
                'name' => 'Cultural Center Ahmed Boukmakh',
                'description' => 'Modern arts and events.',
                'location' => 'Tangier',
                'category' => 'Cultural Center',
                'image' => 'https://imgs.search.brave.com/nnBv9MJEXGkrWTwi_w8-0_cdrgwVQ5ImAuxQzZkT0lQ/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly93d3cu/c2FsbGVzLm1hL2Zp/bGVzL2hhbGxzL2Mx/YzAyY2E1LTI5NWUt/NDI3Yi1hZTdiLTIy/MWJkZWEwMmVlMS9s/YXJnZS9jZW50cmUt/Y3VsdHVyZWwtYWht/ZWQtYm91a21ha2hf/Z2FsbGVyeS53ZWJw',
                'city' => 'Tangier',
                'social_hours' => '10:00 AM - 8:00 PM'
            ],

            // Chefchaouen
            [
                'name' => 'Ras El Ma Spring',
                'description' => 'Calming area with cafés and flowing water.',
                'location' => 'Chefchaouen',
                'category' => 'Natural Spring',
                'image' => 'https://imgs.search.brave.com/LnXh62Pu4ZmtJP-uYzrVbjOH1kg3YBI4rmEnn70yTXk/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9pbWFn/ZXMud29ybGQtb2Yt/d2F0ZXJmYWxscy5j/b20vQ2hlZmNoYW91/ZW5fMDc0XzA1MjEy/MDE1LTQyN3g2NDAu/anBn',
                'city' => 'Chefchaouen',
                'social_hours' => '24/7'
            ],
            [
                'name' => 'Spanish Mosque',
                'description' => 'Hike uphill for epic sunset views.',
                'location' => 'Chefchaouen',
                'category' => 'Religious Site',
                'image' => 'https://imgs.search.brave.com/7EKuHPpuasUDqZFMJw10xs6DanBGgSQjos78jKGRdOI/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly93d3cu/aGFjaGV0dGVib29r/Z3JvdXAuY29tL3dw/LWNvbnRlbnQvdXBs/b2Fkcy8yMDE5LzAx/L01vcm9jY29fQ2hl/ZmNoYW91ZW5Nb3Nx/dWVfYm9nZ3kyMi1p/U3RvY2stNTMxMTM3/Mzc5LmpwZw',
                'city' => 'Chefchaouen',
                'social_hours' => '24/7'
            ],
            [
                'name' => 'Old Medina alleys',
                'description' => 'Colorful, photogenic, and serene.',
                'location' => 'Chefchaouen',
                'category' => 'Historic Site',
                'image' => 'https://imgs.search.brave.com/vj0ZFHoM5IDBbJkedX4LtRYAE8pPemyg3KMgN5-ZBUA/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9waG90/b3Muc211Z211Zy5j/b20vQWZyaWNhL01v/cm9jY28vaS1YQmRC/cnpkLzAvYzBjYjgx/NzUvWEwvRFNDMDAx/MDMtWEwuanBn',
                'city' => 'Chefchaouen',
                'social_hours' => '24/7'
            ],
            [
                'name' => 'Akchour Waterfalls',
                'description' => 'Popular hiking spot near town.',
                'location' => 'Chefchaouen',
                'category' => 'Natural Attraction',
                'image' => 'https://imgs.search.brave.com/1C3qZvJD5bCEDvung2N8OR7Znwgf4Ff0R1-Rxg5t9To/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9tZWRp/YS5pc3RvY2twaG90/by5jb20vaWQvMTIx/NTEwNzQ2OS9waG90/by9ha2Nob3VyLXdh/dGVyZmFsbC1hLXBh/cmFkaXNlLWluLW1v/cm9jY28uanBnP3M9/NjEyeDYxMiZ3PTAm/az0yMCZjPUhnT1lz/RUFhcjRvMkptQWd4/SHh3OS01RUt2a3hZ/YUdTWk8wNVRHbi0y/ck09',
                'city' => 'Chefchaouen',
                'social_hours' => '24/7'
            ],
            [
                'name' => 'Bridge of God (Pont de Dieu)',
                'description' => 'Natural rock formation.',
                'location' => 'Chefchaouen',
                'category' => 'Natural Attraction',
                'image' => 'https://img.atlasobscura.com/1ZG4RKAQNnWftrOL3aK25oc9bToy_X87OsxN85dPO0U/rt:fit/h:400/q:81/sm:1/scp:1/ar:1/aHR0cHM6Ly9hdGxh/cy1kZXYuczMuYW1h/em9uYXdzLmNvbS91/cGxvYWRzL3BsYWNl/X2ltYWdlcy84YzBl/ZGNlZS1iODU2LTQ1/OTMtYmJjZC1hNjMy/ZmU4NWQ5MDU3Y2Zj/NDk0YzcyODUxMGRj/YThfSU1HXzc1ODQu/anBn.webp',
                'city' => 'Chefchaouen',
                'social_hours' => '24/7'
            ],
            [
                'name' => 'Cascades de Chaouen',
                'description' => 'Small waterfalls within the medina.',
                'location' => 'Chefchaouen',
                'category' => 'Natural Attraction',
                'image' => 'https://imgs.search.brave.com/hIzfde1GC5QqegAvIJZHkFInj002Ay-canGqQs4sL_0/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9pbWFn/ZXMud29ybGQtb2Yt/d2F0ZXJmYWxscy5j/b20vQ2hlZmNoYW91/ZW5fMDgwXzA1MjEy/MDE1LTQyN3g2NDAu/anBn',
                'city' => 'Chefchaouen',
                'social_hours' => '24/7'
            ],
            [
                'name' => 'Plaza Uta el-Hammam',
                'description' => 'Center of town for food and people-watching.',
                'location' => 'Chefchaouen',
                'category' => 'Square',
                'image' => 'https://imgs.search.brave.com/lcvtx-WZPLNKGotQDNi6-CyMej6oz_8RXBubB1zDV2o/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9tZWRp/YS5nZXR0eWltYWdl/cy5jb20vaWQvMTk4/MDE4NDE0OS9waG90/by9wbGFjZS1vdXRh/LWVsLWhhbWFtLXNx/dWFyZS1hbmQta2Fz/YmFoLWF0LW5pZ2h0/LWluLWNoZWZjaGFv/dWVuLW1vcm9jY28u/anBnP3M9NjEyeDYx/MiZ3PTAmaz0yMCZj/PWdlUXZLbWVLeHFl/TUc0NmM3S1pCLTJS/ZzRyVnpfM1ljWGIx/cF9Sc21Sc2c9',
                'city' => 'Chefchaouen',
                'social_hours' => '24/7'
            ],
            [
                'name' => 'Kasbah Museum',
                'description' => 'Historic fortress with exhibits.',
                'location' => 'Chefchaouen',
                'category' => 'Museum',
                'image' => 'https://images.mnstatic.com/aa/a6/aaa6082b48230405456ad912c109c49d.jpg?quality=75&width=100&height=90&aspect_ratio=100%3A90',
                'city' => 'Chefchaouen',
                'social_hours' => '9:00 AM - 5:00 PM'
            ],
            [
                'name' => 'Talassemtane National Park',
                'description' => 'Hiking, rivers, forests.',
                'location' => 'Chefchaouen',
                'category' => 'National Park',
                'image' => 'https://imgs.search.brave.com/0wULYkPn7w473LlAJ8JI4fk1Ro6mLZcuHlCcGJMy3m0/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly91cGxv/YWQud2lraW1lZGlh/Lm9yZy93aWtpcGVk/aWEvY29tbW9ucy9l/L2UzL1RhbGFzc2Vt/dGFuZV9OYXRpb25h/bF9QYXJrXyg1MDY1/MTM1NjkwKS5qcGc',
                'city' => 'Chefchaouen',
                'social_hours' => '24/7'
            ],

            // Tetouan
            [
                'name' => 'Tetouan Medina',
                'description' => 'Andalusian-style and very authentic (UNESCO site).',
                'location' => 'Tetouan',
                'category' => 'Historic Site',
                'image' => 'https://imgs.search.brave.com/2PYJMgzKCqWtJVG_aUYYwtCYCHOFwn6acAuzhdkU91o/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9ncmVl/bm9saXZlYXJ0cy5j/b20vd3AtY29udGVu/dC91cGxvYWRzL1Rl/dG91YW4tTWVkaW5h/LUphYW1hS0JpcmEt/SmVmZi1NY1JvYmJp/ZS0xMDI0eDc2MS5q/cGc',
                'city' => 'Tetouan',
                'social_hours' => '24/7'
            ],
            [
                'name' => 'Royal Palace',
                'description' => 'Iconic square and building (view from outside).',
                'location' => 'Tetouan',
                'category' => 'Historic Site',
                'image' => 'https://imgs.search.brave.com/Q6ylDDBGAM2Gw4_lWWq7IRgKiUwrUnVjL17f2W3LKI4/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9jZG4u/YnJpdGFubmljYS5j/b20vODEvOTk5ODEt/MDA0LUIxRDVFMUJG/LmpwZw',
                'city' => 'Tetouan',
                'social_hours' => '24/7'
            ],
            [
                'name' => 'Ethnographic Museum',
                'description' => 'Local history inside the Royal Kasbah.',
                'location' => 'Tetouan',
                'category' => 'Museum',
                'image' => 'https://dynamic-media-cdn.tripadvisor.com/media/photo-o/27/07/30/b4/arco-nazari-de-madera.jpg?w=1000&h=-1&s=1',
                'city' => 'Tetouan',
                'social_hours' => '9:00 AM - 5:00 PM'
            ],
            [
                'name' => 'Martil Beach',
                'description' => 'Popular beach town just 10 min away.',
                'location' => 'Tetouan',
                'category' => 'Beach',
                'image' => 'https://imgs.search.brave.com/S_3SpxFw0ZEVj_Wv7fai5fS80Rr6fZ_GIq8ak70W988/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly93d3cu/d29ybGRiZWFjaGd1/aWRlLmNvbS9waG90/b3MvbWVkaXVtL21h/cnRpbC1iZWFjaC1t/b3JvY2NvLmpwZw',
                'city' => 'Tetouan',
                'social_hours' => '24/7'
            ],
            [
                'name' => 'Tamuda Bay',
                'description' => 'Luxury coastal resorts and quiet beaches.',
                'location' => 'Tetouan',
                'category' => 'Beach',
                'image' => 'https://imgs.search.brave.com/6CfIcRcpQX7xkUttwGaNIRLz8lsoOaB9h9qNeI2bvN4/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9jbXMu/dHJhdmVsbm9pcmUu/Y29tL3dwLWNvbnRl/bnQvdXBsb2Fkcy8y/MDIzLzExL2ltYWQt/Z2hhemFsLWpVVnFL/V3lBUUljLXVuc3Bs/YXNoLXNjYWxlZC1l/MTcwMDY1MTYwNjc2/Mi0xNTY4eDEwNDku/anBn',
                'city' => 'Tetouan',
                'social_hours' => '24/7'
            ],
            [
                'name' => 'Tetouan Art School',
                'description' => 'National Institute of Fine Arts - modern culture.',
                'location' => 'Tetouan',
                'category' => 'Cultural Center',
                'image' => 'https://dynamic-media-cdn.tripadvisor.com/media/photo-o/17/d3/53/93/dar-sanaa.jpg?w=1000&h=-1&s=1',
                'city' => 'Tetouan',
                'social_hours' => '9:00 AM - 5:00 PM'
            ],

            // Al Hoceima
            [
                'name' => 'Quemado Beach',
                'description' => 'Scenic beach right next to city center.',
                'location' => 'Al Hoceima',
                'category' => 'Beach',
                'image' => 'https://imgs.search.brave.com/6x6WXGN3pa9mQ0OvuWozuBPa_IzzSMJUoG1VykPHxKo/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9sYW56/YXJvdGVob2xpZGF5/cGxhbm5lci5jb20v/d3AtY29udGVudC91/cGxvYWRzLzIwMjMv/MTAvcGxheWEtcXVl/bWFkYS10d28tYmVh/Y2hlcy01NTB4NTUw/LmpwZw',
                'city' => 'Al Hoceima',
                'social_hours' => '24/7'
            ],
            [
                'name' => 'Plage Thara Youssef',
                'description' => 'Calm, lesser-known beach.',
                'location' => 'Al Hoceima',
                'category' => 'Beach',
                'image' => 'https://imgs.search.brave.com/AFsn6exqTOecBJDhBWXJDcK3wltIl6RftpX_ydse47k/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9iZWFj/aGVzLXNlYXJjaGVy/LmNvbS9pbWFnZXMv/YmVhY2hlcy81MDQy/MDEwNDQvTUEyMDEw/NDQuanBn',
                'city' => 'Al Hoceima',
                'social_hours' => '24/7'
            ],
            [
                'name' => 'Plage Calabonita',
                'description' => 'Cozy cove beach.',
                'location' => 'Al Hoceima',
                'category' => 'Beach',
                'image' => 'https://imgs.search.brave.com/pEI-dsrdSN3UvCH1-_ZP739AuYKSVM3gsUar-Ixlgks/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9saDUu/Z29vZ2xldXNlcmNv/bnRlbnQuY29tL3Av/QUYxUWlwTlNVVUJ2/Sl8xenJuOEdFVE5G/cnVmVXM0QlI3b21C/d1ROVU9wbS09czI1/MA',
                'city' => 'Al Hoceima',
                'social_hours' => '24/7'
            ],
            [
                'name' => 'Al Hoceima National Park',
                'description' => 'Cliffs, hiking, and sea views.',
                'location' => 'Al Hoceima',
                'category' => 'National Park',
                'image' => 'https://imgs.search.brave.com/ILPU8tXIKGPIEgp_WmceOmmeQi73Z6jkuW2ls81CkRw/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9icmFp/bnliYWNrcGFja2Vy/cy5jb20vd3AtY29u/dGVudC91cGxvYWRz/LzIwMjAvMDMvSGlr/aW5nLUFsLUhvY2Vp/bWEtTmF0aW9uYWwt/UGFyay1Nb3JvY2Nv/LmpwZw',
                'city' => 'Al Hoceima',
                'social_hours' => '24/7'
            ],
            [
                'name' => 'Port of Al Hoceima',
                'description' => 'Walkable, lively area with fresh seafood.',
                'location' => 'Al Hoceima',
                'category' => 'Port',
                'image' => 'https://imgs.search.brave.com/cTGYoVXvEKy8n7SuRc-_BREvncB-2Rps6phiAAKlafA/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9pbWFn/ZXMuZmVycnlob3Bw/ZXIuY29tL2xvY2F0/aW9ucy9tb3JvY2Nv/L2FsaG9jZWltYS9h/bC1ob2NlaW1hLXBv/cnQtc3Vuc2V0Lmpw/Zw',
                'city' => 'Al Hoceima',
                'social_hours' => '24/7'
            ],
            [
                'name' => 'Souani Beach',
                'description' => 'Clean and spacious beach ideal for sunset.',
                'location' => 'Al Hoceima',
                'category' => 'Beach',
                'image' => 'https://imgs.search.brave.com/CuGbs7BIHzqi7Qob71ADnLdGrFdgmEN48yvVH_g9mQg/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9saDUu/Z29vZ2xldXNlcmNv/bnRlbnQuY29tL3Av/QUYxUWlwTnNLOWNN/eGZlY2ZqbFdKbWxW/QnpaUXR5RkhHc0Vm/cXppTDlWclQ9czE2/MDA',
                'city' => 'Al Hoceima',
                'social_hours' => '24/7'
            ],
            [
                'name' => 'Bades Island',
                'description' => 'Spanish island near Moroccan coast (view from afar).',
                'location' => 'Al Hoceima',
                'category' => 'Viewpoint',
                'image' => 'https://i.pinimg.com/736x/c5/70/4d/c5704dd057286c3a2710234c4b523dfe.jpg',
                'city' => 'Al Hoceima',
                'social_hours' => '24/7'
            ],

            // Asilah
            [
                'name' => 'Asilah Medina Murals',
                'description' => 'Changing every year during art festival.',
                'location' => 'Asilah',
                'category' => 'Art',
                'image' => 'https://imgs.search.brave.com/RsHbpsAHOUj8TEELaquxgc8kQ8FoKbodT4R77h6OmtE/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly93d3cu/cmV2aWdvcmF0ZS5j/b20vaW1hZ2VzL21l/ZGluYS1vZi1hc2ls/YWguanBn',
                'city' => 'Asilah',
                'social_hours' => '24/7'
            ],
            [
                'name' => 'Paradise Beach (Plage Rmilat)',
                'description' => 'Relaxing and natural.',
                'location' => 'Asilah',
                'category' => 'Beach',
                'image' => 'https://imgs.search.brave.com/toEgsQk_2Dds_g9GnYgPCMEBJ8LW6-EhePnJ5xvUqjE/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly93d3cu/dm95YWdld2F5LmNv/bS93cC1jb250ZW50/L3VwbG9hZHMvMjAx/NC8xMC9jb3VjaGVy/LWRlLXNvbGVpbC1v/Y2Vhbi1hdGxhbnRp/cXVlLWFzaWxhaC02/MDB4Mzk3LmpwZw',
                'city' => 'Asilah',
                'social_hours' => '24/7'
            ],
            [
                'name' => 'Borj Krikiya',
                'description' => 'Watchtower on the edge of the sea.',
                'location' => 'Asilah',
                'category' => 'Historic Site',
                'image' => 'https://imgs.search.brave.com/JBmNWYpm7AqAD28e-peA-LZg3QIGoHkASuvqZ9i50i0/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly90My5m/dGNkbi5uZXQvanBn/LzEzLzM4LzgzLzMw/LzM2MF9GXzEzMzg4/MzMwMjFfbTFTcDMx/dDhQVXVib3BGNm52/N0lGblJLQ2xZTEhY/R3cuanBn',
                'city' => 'Asilah',
                'social_hours' => '24/7'
            ],

            // Larache
            [
                'name' => 'Lixus Ruins',
                'description' => 'Roman ruins near the river with ocean view.',
                'location' => 'Larache',
                'category' => 'Historic Site',
                'image' => 'https://imgs.search.brave.com/UDIlNp_x2kBaeGDg4Gm65HfumFeITrmxGVASaUl06ro/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly93d3cu/bW9yb2Njby1ndWlk/ZS5jb20vaW1hZ2Vz/L2FuY2llbnQtY2l0/aWVzLW9mLW1vcm9j/Y28vbGl4dXMvbGl4/dXMuanBn',
                'city' => 'Larache',
                'social_hours' => '9:00 AM - 5:00 PM'
            ],
            // Other Northern Gems
            [
                'name' => 'Cap Spartel',
                'description' => 'Where Atlantic meets Mediterranean.',
                'location' => 'Tangier region',
                'category' => 'Natural Attraction',
                'image' => 'https://imgs.search.brave.com/K52P1BfTrMrVqrRMM32wab5r_2_LqdQXk28aRX-1ZOg/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly90My5m/dGNkbi5uZXQvanBn/LzA2LzQzLzk2Lzky/LzM2MF9GXzY0Mzk2/OTI1MF8xbXl0SExZ/emhyUmcwU1dKMjJW/YWhSdmhJTUN0MjJG/MS5qcGc',
                'city' => 'Tangier',
                'social_hours' => '24/7'
            ],
            [
                'name' => 'Dalia Beach',
                'description' => 'Turquoise water and fewer tourists.',
                'location' => 'Tangier region',
                'category' => 'Beach',
                'image' => 'https://imgs.search.brave.com/Y-DYRLGEz4avwFBI_pWGJvk9az_0lFln-ery6XjcJfY/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9iZWFj/aGVzLXNlYXJjaGVy/LmNvbS9pbWFnZXMv/YmVhY2hlcy81MDQy/MDEwOTUvTUEyMDEw/OTUuanBn',
                'city' => 'Tangier',
                'social_hours' => '24/7'
            ],
            [
                'name' => 'Oued Laou',
                'description' => 'Gorgeous river town and beach.',
                'location' => 'Near Tetouan',
                'category' => 'Beach',
                'image' => 'https://imgs.search.brave.com/bNBDx3ZZyj98dK2DbAzgRrbDgSd8uS7AXz2hmntyQko/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly93d3cu/d2Vsb3ZlYnV6ei5j/b20vd3AtY29udGVu/dC91cGxvYWRzLzIw/MTYvMTAvYXBwYXJ0/LWhvdGVsLW91ZWQt/bGFvdS1tYXJvYzAu/anBn',
                'city' => 'Tetouan',
                'social_hours' => '24/7'
            ],
            [
                'name' => 'Fahs Lamhar Plateau',
                'description' => 'Open highland area offering views over the north.',
                'location' => 'Near Tetouan, Morocco',
                'category' => 'Nature',
                'image' => 'https://atc.ma/images/evenements/Fahs_Lmher.webp',
                'city' => 'Tetouan',
                'social_hours' => '24/7',
            ],
            [
                'name' => 'Jbel Lebyad',
                'description' => 'Mountain popular with hikers.',
                'location' => 'Northern Morocco',
                'category' => 'Hiking',
                'image' => 'https://imgs.search.brave.com/Lnafugl62WsCjaOnUIdLEViSGIhWHHX_X-WLMaFJOC4/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9oYXBw/eXRyaXAubWEvd3At/Y29udGVudC91cGxv/YWRzLzIwMjMvMDQv/amViZWwtbGFieWFk/LWphYmFsLWxhYmlh/ZC1qYWJlbC1sYWJ5/YWQtZmFoc3MtbGFt/aGFyLWZhaGVzcy1s/ZW1oZXItaGFwcHl0/cmlwLXJhbmRvbm5l/ZS12b3lhZ2Utb3Jn/YW5pc2UtYXUtbWFy/b2MtdGV0b3Vhbi1i/ZWx5b3VuZWNoLSVE/OCVBQyVEOCVBOCVE/OSU4NC1zY2FsZWQu/anBn',
                'city' => 'Tetouan',
                'social_hours' => '24/7',
            ],

        ]);
    }
}
