<?php

// namespace App\Imports;

// use Illuminate\Support\Collection;

// namespace App\Imports;

// use App\Models\Exceldata;
// use Illuminate\Support\Collection;
// use Maatwebsite\Excel\Concerns\ToCollection;
// use Maatwebsite\Excel\Concerns\WithHeadingRow;

// class YourExcelImport implements ToCollection
// {
    /**
    * @param Collection $collection
    */
    // public function collection(Collection $collection)
    // public function collection(Collection $rows)
    // {
    //     foreach ($rows as $row) {
            // Here, $row is an array representing each row in the Excel file.
            // You can access the data from each column using array indexes.
            // $date = $row[1]; // Assuming the name is in the first column (index 0)
            // $tasks = $row[2]; // Assuming the email is in the second column (index 1)
            // $priority = $row[3]; // Assuming the age is in the third column (index 2)
            // $status = $row[4];
            // dd( $date );
            // $date = $row['Date'];
            // $date = $row['Date'] ?? $row['date'] ?? $row['Date '] ?? $row['date '];
            // // $activity = $row['Activities / Tasks / Items'];
            // $activity = $row['Activities / Tasks / Items'] ?? $row['Activities / Tasks'] ?? $row['Activities'];
            // $priority = $row['Priority'];
            // $status = $row['Status'];

            // Now you can perform any operations you need with this data.
            // For example, you can create a new model and save the data to the database.
            // Note that you need to define YourModel before using it here.

            // Example of saving the data to the database using YourModel
    //         Exceldata::create([
    //             'date' => $date,
    //             'tasks' => $tasks,
    //             'priority' => $priority,
    //             'status' => $status,
    //         ]);
    //      }
    // }
// }


// app/Imports/YourExcelImport.php

namespace App\Imports;
use App\Models\Exceldata;
use App\Models\Task;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\ToArray;


class YourExcelImport implements ToArray, WithHeadingRow

{
    protected $data = [];
    public function array(array $rows)
    {
        foreach ($rows as $row) {
            // Assuming the Excel columns have the following headings:
            // 'Date', 'Activities / Tasks / Items', 'Priority', 'Status'

            $date = $row['date'] ?? $row['Date'] ?? $row['DATE'];

            $activity = $row['tasks'] ?? $row['Tasks'] ?? $row['TASKS'];
            $priority = $row['priority'] ?? $row['Priority'] ?? $row['PRIORITY'];
            $status = $row['status'] ?? $row['Status'] ?? $row['STATUS'];

            // Now you can create a new Task model and save the data to the database.
            // Assuming you have a Task model, replace 'Task' with your actual model class.

            // Exceldata::create([
            //     'date' => $date,
            //     'tasks' => $activity,
            //     'priority' => $priority,
            //     'status' => $status,
            // ]);
            $this->data[] = [
                'date' => $date,
                'activity' => $activity,
                'priority' => $priority,
                'status' => $status,
            ];
        }
    }
    public function getData()
    {
        return $this->data;
    }
}


