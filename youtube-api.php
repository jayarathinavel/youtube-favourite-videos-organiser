<?php
    //Method to get the Duration of video.
    function getDuration($videoID, $apikey){
        $dur = file_get_contents("https://www.googleapis.com/youtube/v3/videos?part=contentDetails&id=$videoID&key=$apikey");
        $VidDuration =json_decode($dur, true);
        foreach ($VidDuration['items'] as $vidTime){
            $VidDuration= $vidTime['contentDetails']['duration'];
        }
        preg_match_all('/(\d+)/',$VidDuration,$parts);
        return $parts[0][0] . ":" . $parts[0][1]; // Return MM:SS
    }

    //Method to get the title of video
    function getTitle($videoID, $apikey){
        $url = "https://www.googleapis.com/youtube/v3/videos?id=" . $videoID . "&key=" . $apikey . "&part=snippet,contentDetails,statistics,status";
        $json = file_get_contents($url);
        $getData = json_decode( $json , true);
        foreach((array)$getData['items'] as $key => $gDat){
            $title = $gDat['snippet']['title'];
        }
        return $title;
    }

    //Method to get thumbnail of the video
    function getThumbnail($videoID){
        $thumbnail_url = "https://i.ytimg.com/vi/".$videoID."/mqdefault.jpg";
        return $thumbnail_url;
    }
  ?>