<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Mail Box') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <table class="table">
                <thead>
                    <tr class="table-dark">
                        <th>Sent by</th>
                        <th>Subject</th>
                        <th>Email</th>
                        <th>More info</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($mails as $mail)
                        <tr>
                            <td>
                                {{$mail->sent_by}}
                            </td>
                            <td>
                                {{$mail->subject}}
                            </td>
                            <td>
                                {{$mail->email}}
                            </td>
                            <td>
                                <button type="submit" class="btn btn-primary">Show</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
               </table>
        </div>
    </div>
</x-app-layout>