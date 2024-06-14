<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function getCitiesByCountryCode($country_code)
    {
        // Hardcoded list of cities for demonstration purposes
        $cities = [
            'PK' => [
                "Oghi", "Abottabad", "Balakot", "Akora Khattak", "Aman Garh", "Dargai", "Gahri Kapoora", "Ghazi",
                "Jahangira", "Katlang", "Pabbi", "Rashakae", "Risalpur", "Rustam", "Sher Garh", "Sakhakot",
                "Sheikh Maltoon", "Takht-i-Bahi", "Notak", "Paharpur", "Kaloorkot", "Dulywala", "Manekra",
                "Sara-a Mahajar", "Rangpur", "Hyderabad Thal", "Paroa", "Khansar", "Darya Khan", "Behal", "Pezo",
                "Jhok Mehar Shah", "Jhandala Sher Khan", "Jhabran", "Ajnianwala", "Karchak", "Charcheck",
                "Jhaamkay", "Chaubara", "DAIRA DEEN PANAH", "Ehsan Pur", "Garh Mahraja", "Jaman Shah", "Ladhana",
                "Arifwala", "Gojra Toba Tek Singh", "Rato Dero", "Rawalpindi", "Rawat", "Rahim yar khan",
                "Khushab", "Qazi Ahmed", "Sambrial", "Sundar", "Sargodha", "Shakargarh", "Shahdara", "Shuja Abad",
                "Shahkot", "Sangla Hills", "Shahpur Jahania", "Shikarpur", "Sara-e-alamgir", "Dera Ghazi Khan",
                "Sialkot", "Sukkur", "Sillanwali", "Samundri", "Sohawa", "Sheikhupura", "Shahpur Saddar",
                "Sadiqabad", "Shorkot", "Satiayana", "Swabi", "Sahiwal", "Swat", "Tando Adam", "Tando Jam",
                "Tandlianwala", "Tando Allah Yar", "Thatta", "Talagang", "Tando Muhammad Khan", "Paigham", "Topi",
                "Tarbela", "Toba tek singh", "Tatlay wali", "Taxila", "Ubauro", "Quetta", "Ugoke", "Umer Kot",
                "Usta Muhammad", "Vehari", "Wah cantt", "Wan Bhachran", "Bheria City (Nawabshah)", "Wazirabad",
                "Yazman", "Zafarwal", "Khurrianwala", "Abdul Hakeem", "Basti Shorekot", "Shorkot Cantonment",
                "MATIARI", "Khyber", "Alipur Chatha", "Ahmedpur East", "Ahmedpur Lamma", "Sakardu", "Hub", "Buner",
                "Alipur", "Attock", "Issa Khel", "Tour Dair", "Darra", "Nawakalai", "Rabwah", "Warbatun", "Badin",
                "Bhikhi", "Bahawalpur", "Garhmore", "Bhakkar", "Bhimber", "Bhai Pheru", "Burewala", "Timergara",
                "Uch Sharif", "Basirpur", "Sadhokee", "Chichawatni", "Chishtian", "Samundri", "Chakwal", "Chashma",
                "Jammbur", "Charsadda", "Karor Pakka", "More Khunda", "Mannanwala", "Chawinda", "Dera Allah Yar",
                "Dadyal AK", "Tall", "Sawari", "Dour", "Donga Bonga", "Digri", "Shamki Bhattian", "Dera Ismail Khan",
                "Athara Hazari", "Dina", "Fazal Pur", "Daharki", "Bandhi", "Dera Murad Jamali", "Dunya Pur",
                "Bagh", "Duabba", "Depalpur", "Daska", "More Aimanabad", "Nankana Shahib", "Fort Abbass",
                "Lakki Marwat", "Faqirwali", "Fateh Jang", "Rawalakot", "Feroze Wattwan", "Fatehpur", "Gambat",
                "Guddu", "Gakhar Mandi", "Gujar khan", "Nizampur", "Tank", "Qaboola", "Gaggo Mandi", "Goth Machi",
                "Gujrat", "Ghotki", "Gujranwala", "Dawood Khel", "Hazro", "Hyderabad", "Head Marala", "Hujra Shah Mukeem",
                "Duniapur", "Umar Zai", "Haveli Lakha", "Haripur", "Chua Saidain Shah", "Rahwali", "Haroonabad",
                "Harappa", "Hasilpur", "Hassan abdal", "Hattian", "Hattar", "HawiliaN", "Hafizabad", "HUB CHOWKI",
                "Chiniot", "Islamabad", "Iskandarabad", "Jacobabad", "Jhang", "Jalalpur Jattan", "Jhelum", "Kot Chutta",
                "Jahanian", "Jand", "Jatoi", "Jalalpur pirwala", "Jauharabad", "Jamshoro", "Bhalwal", "Jatlan",
                "Jaranwala", "GHAKHAR", "Kamra", "Kala Bagh", "Kabirwala", "Shahpur Chakar", "Khewra", "JILALPUR BHATIAN",
                "Karachi", "Khairpur Mirs", "Kahuta", "Kandh Kot", "Kallar Kahar", "Kotli Loharan", "Klaske",
                "Kamoke", "Kamalia", "Kamir", "Kunri", "Kotli AK", "Kot Addu", "Khanpur Dam", "Kotla Arab Ali Khan",
                "Kharian", "Kallar Saddiyian", "Kala Shah Kaku", "Kashmore", "Kasur", "Kot Momin", "Khanewal",
                "Bannuu", "CHITRAL", "Larkana", "Lahore", "Lala Musa", "Lodhran", "Liaqatpur", "Faisalabad",
                "Layyah", "Muzaffarabad", "Mandi bahauddin", "Mian Channu", "Mardan", "Mangla", "Minchinabad",
                "Mehar", "Matiari", "Malakwal", "Mailsi", "Manga Mandi", "Mansehra", "Mandra", "Mirpur Khas",
                "Mirpur Mathelo", "Maqsoodo", "Muridke", "Mithi", "Multan", "Mian wali", "Muzaffargarh", "Shehdadpur",
                "Bahawal nagar", "Nowshera virka", "Nowshera", "Khanpur", "Nooriabad", "Narowal", "Naudero", "Kohat",
                "Okara", "Pindi Bhattian", "Pind dadan Khan", "Peshawar", "Pindi Gheb", "Phalia", "Pir Mahal",
                "Panno aqil", "Piplan", "Pak Pattan Sharif", "Pasrur", "Pattoki", "Kamber Ali Khan", "Quaid abad",
                "Qalla Didar Singh", "Mirpur Azad Kashmir", "Murree", "Rohri", "Jampur", "Renala Khurd", "Raiwind",
                "Ranipur", "Dinga", "Gadoon Amazai", "Sara-a-Naurang", "Hangu", "Karak", "Lachi", "Muhammadpur",
                "Fazilpur", "Rajanpur", "Rojhan", "Mithankot", "Choti Zareen", "Taunsa Sharif", "Tibbi Qaisrani",
                "Kot Qaisrani", "Wahowa", "Sakhi Sarwar", "Dajal", "Gharo", "Makli", "Sujawal", "Tharoshah",
                "New Saeedabad", "Sakrand", "Buchari", "Sinjhoro", "Khadro", "Jhol", "Khairpur Nathan Shah", "Johi",
                "Bhan Saeedabad", "Phulji Station", "Padidan", "Dadu", "Moro", "Kandiaro", "Daulatpur", "Noshero Feroze",
                "Sehwan Sharif", "Mehrabpur", "Nawab Shah", "Sanghar", "Kotri", "Sibi", "Karianwala", "Kabal",
                "Chak Dera", "Mingora", "Lower Dir", "Khawaza Khela", "Bahrain", "Maidain", "Aman Kot", "Malakand",
                "Matta", "Upper Dir", "Bari Kot", "Thana", "Kanju Township", "Saidu Sharif", "Batkhela", "Char Bagh",
                "Bhagatwala", "Chak Jhumra", "Chowk Azam", "Chowk Munda", "Dahranwala", "Gharo", "Khichiwala",
                "McLeodganj", "Marot", "ShahJamal", "Tibba Sultanpur", "Piryalo", "Chatter Kalas", "Alhajri",
                "Kahori Pull", "Chhori", "Hattain Bala", "Komi Kot", "Kohala", "Chella", "Wapda colony - Muzaffarabad",
                "Languar Pura", "Ghari Duptta", "CHAKSAWARI", "ISLAM GARH", "Chianri", "Pattika", "ADILPUR", "ARIJA",
                "BADAH", "BAKRANI", "BAKSHAPUR", "BHITSHAH", "BULRI SHAH KAREEM", "DARBELO", "DAUR", "DIPLO",
                "DOKRI", "GARI YASIN", "GOLARCHI", "HALA", "HINGORJA", "JUDDO", "KHAIR PUR MAHAR", "KHIPRO",
                "KOT BANGLOW", "KOT DIJI", "KOT GULLAM MOHD", "KUMB", "MADEJI", "MATLI", "MIRPUR BATHORO",
                "MIRPUR SAKRO", "MIRWAH", "NAUKOT", "PIR-JO-GOTH", "SALEH PAT", "SAMARO", "SETHARJA", "SHAHDADKOT",
                "TALHAR", "TANDO BAGO", "TANDO JAAN MUHAMMAD", "WAGAN", "AHMADPUR SIAL", "AWAN SHARIF", "BALKASAR",
                "BARNALA", "BHARWANA", "BHERA", "BHONE", "BIKHARI KALAN", "BUCHAL KALAN", "CHANGA MANGA", "CHOWK BAHADUR PUR",
                "CHOWK SERVER SHAHEED", "CHUNIA", "DANDOT", "DERA NAWAB", "DHAB KALAN", "DHUDIAL", "DIJKOT", "ELLAH ABBAD",
                "FAROOQABAD", "GIROT", "HABIBA ABAD", "HARNOLI", "HEAD BALOKI", "HEAD MUHAMMAD WALA", "KACHA KHHO",
                "KAMER MISHANI", "KANGAN PUR", "KARAM PUR", "KAROOR LALISON", "KHAIRPUR TAMEWALI", "KHAN GARH", "KHANKA DOGRAN",
                "KHUDDIAN", "KOT RADHA KISHAN", "KOT SAMABA", "KOT SULTAN", "KOTLA JAM", "KUNDAIN", "KUNJA CITY", "LALIYAN",
                "LAWA", "MAKHDOOM ALI", "MAKHDOOM RASHEED", "MAMUKANJIN", "MANDI FAIZABAD", "MANDI SHAH JEWNA", "MANGWAL",
                "MARI INDUS", "MIANI", "MULHAL MUGHLA", "MUNARA", "MURRED AIR BASE", "MUSAFIR KHANA", "NANDI PUR", "NARANG MANDI",
                "NEELA DHULLA", "NOORPUR NOORANGA", "OUDHERWAL", "PAINSARA", "PHULARWAN", "QADIRPUR RAWAN", "RAJANA", "SAFDRA ABAD",
                "SAMASATTA", "SANAWAAN", "SUKHIKY MANDI", "TANDA", "Chattar Plain", "Beerkund Khaki", "Chita Bata", "Batrasi",
                "KAKUL", "SHABQADAR", "Attershshaan", "QALANDERABAD", "Thheri", "Uggi", "PANIYAL", "Gharhi mori", "Sobhodero",
                "Halani", "Rasoolabad", "Kotri Kabir", "Thari Mirwah", "Bozdar Wada", "Karoondi", "Pacca Chang", "Akri Choudgi",
                "Chundiko", "Hindyari", "Agra", "Sindhri", "Kandiari", "Hatoongo", "Khawaja Stop", "Doronaro", "Chohr Cant",
                "Chachoro", "Islamkot", "Kaleki mandi", "RASOOL PUR TARAR", "KASSO KE", "Wanike TARAR", "KOLO TARAR",
                "SALEEM PURA JHALAN", "Kot Sarwar", "Burj Dara", "Chak Kharal", "Chak Ghazi", "Kote Jamel", "Chirya Wala",
                "PHULL", "NEW JATOI", "Sharaq Pur", "Jalal Pur Shareef", "Gojra Mandi Bahauddin", "DARYA KHAN MARI",
                "Khanewahan", "Pakky Wala", "Jhambra", "Haveli Bahadur Shah", "Bhawana", "K.N. Shah", "Tangi", "Mureed Wala",
                "Kider wala", "Phalore", "KANJWANI", "Qadirabad", "Pahrianwali", "Chillianwala", "Mojianwala", "Bhikhi Sharif",
                "Kuthiala Shaikhan", "Head Rasool", "Jholana", "HEAD FAQEERIAN", "Bajur Agency", "Shirangal", "Alpuri",
                "Aloch", "Puran", "Shamozai", "Qambar", "Odigram", "Balogram", "Mangat", "Kakra Town", "Afzal Pur", "Chachian",
                "MITHYANI", "Baddomali", "Talwandi Bhindran", "Qila Kalar Wala", "Nurkot", "Akhterabad", "Bangla Gogera",
                "Sher Ghar", "Mandi Ahmedabad", "Rajowal", "Okara Cantt", "Kot Abdul Malik", "Mandi Usman Wala", "Mustafabad",
                "CHOTA SAHIWAL"
            ],
            'US' => ['Toronto', 'Vancouver', 'Montreal', 'Calgary', 'Ottawa'],
            'GB' => ['London', 'Birmingham', 'Manchester', 'Glasgow', 'Liverpool'],
            // Add more countries and cities as needed
        ];

        // Check if the country code exists in the cities array
        if (array_key_exists(strtoupper($country_code), $cities)) {
            return response()->json($cities[strtoupper($country_code)]);
        } else {
            return response()->json(['error' => 'Country code not found'], 404);
        }
    }

    
}
