<!DOCTYPE html>
<html>

<head>
    <title>Google Drive Directories and Files</title>
</head>

<body>
    <h1>Google Drive Directories and Files</h1>
    <ul>
        @foreach ($directories as $directory)
            <li>
                <strong>{{ $directory['name'] }}</strong>
                @if (!empty($directory['children']))
                    <ul>
                        @foreach ($directory['children'] as $child)
                            <li>
                                @if ($child['type'] === 'directory')
                                    <strong>{{ $child['name'] }}</strong>
                                    @if (!empty($child['children']))
                                        <ul>
                                            @foreach ($child['children'] as $subchild)
                                                <li>{{ $subchild['name'] }}</li>
                                            @endforeach
                                        </ul>
                                    @endif
                                @else
                                    {{ $child['name'] }}
                                @endif
                            </li>
                        @endforeach
                    </ul>
                @endif
            </li>
        @endforeach
    </ul>
</body>

</html>
