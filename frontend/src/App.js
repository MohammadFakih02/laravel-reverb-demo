import React, { useState, useEffect } from 'react';
import Echo from 'laravel-echo';
import Pusher from 'pusher-js';


window.Pusher = Pusher;

const echo = new Echo({
    broadcaster: 'reverb',
    key: '6roraypithf7v8krcpff',
    wsHost: 'localhost', 
    wsPort: 8080,
    forceTLS: false,
    enabledTransports: ['ws'], 
});


function App() {
    const [content, setContent] = useState('');

    useEffect(() => {
      const channel = echo.channel('content-channel');
  
      console.log('Listening to content-channel...');
  
      channel.listen('.updateContent', (updatedContent) => {
          console.log('Event received:', updatedContent);
          setContent(updatedContent.content);
      });
  
      return () => {
          echo.leaveChannel('content-channel');
      };
  }, []);  

    const handleEdit = async (event) => {
        const updatedContent = event.target.value;
        setContent(updatedContent);

        try {
            await fetch('http://localhost:8000/api/update-content', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({ content: updatedContent }),
            });
        } catch (error) {
            console.error('Error updating content:', error);
        }
    };

    return (
        <div className="App">
            <h1>Real-time Collaborative Text Editor</h1>
            <textarea
                value={content}
                onChange={handleEdit}
                rows={10}
                cols={50}
            />
        </div>
    );
}

export default App;
